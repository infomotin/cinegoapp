<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\PropertyMessage;
use App\Models\User;

class PropertyMessageController extends Controller
{
    //PropertyMessageStore
    public function PropertyMessageStore(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            //first check if the user already sent a message to this property
            $check = PropertyMessage::where('user_id', $id)->where('property_id', $request->property_id)->first();
            if ($check) {
                $notification = array(
                    'message' => 'You have already sent a message to this property',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } else {
                $propertymessage = new PropertyMessage();
                $propertymessage->user_id = $id;
                $propertymessage->agent_id = $request->agent_id;
                $propertymessage->email = $request->email;
                $propertymessage->phone_number = $request->phone;
                $propertymessage->property_id = $request->property_id;
                $propertymessage->message = $request->message;
                $propertymessage->created_at = Carbon::now();
                $propertymessage->save();
                $notification = array(
                    'message' => 'Message Send Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Please Login First',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        return back();
    }
    //AgentMessageIndex
    public function AgentMessageIndex()
    {
        $agent_id = Auth::user()->id;
        $messages = PropertyMessage::where('agent_id', $agent_id)->latest()->get();
        return view('agent.message.index', compact('messages'));
    }
    //AgentMessageInbox
    public function AgentMessageInbox()
    {
        $user_id = Auth::user()->id;
        $messages = PropertyMessage::where('agent_id', $user_id)->latest()->get();
        return view('agent.message.inbox', compact('messages'));
    }
    //AgentMessageShow
    public function AgentMessageShow($id)
    {
        //get agent name 
        $agent_id = Auth::user()->id;
        $agent = User::where('id', $agent_id)->first();
        $agent_name = $agent->name;
       
    


        $message = PropertyMessage::with('property')->with('user')->with('agentName')->find($id);
        return view('agent.message.show', compact('message', 'agent_name'));
    }
    //AdminMessageInbox
    public function AdminMessageInbox()
    {
        $messages = PropertyMessage::latest()->get();
        return view('admin.backend.message.inbox', compact('messages'));
    }
}
