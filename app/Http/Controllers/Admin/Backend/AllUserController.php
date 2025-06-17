<?php

namespace App\Http\Controllers\Admin\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;


class AllUserController extends Controller
{
    //AllUserIndex
    public function AllUserIndex()
    {
       
        $users = User::all();
        return view('admin.backend.alluser.index',compact('users'));
    }
    //AllUserActiveInactive
    public function ChangeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $user->status == 'active' ? 'inactive' : 'active';
        $user->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
    //AllUserCreate
    public function AllUserCreate()
    {
        return view('admin.backend.alluser.create');
    }
    //AllUserStore
    public function AllUserStore( Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'username' => 'required|string|max:255|unique:users',
            
        ]);
        //Create Temp Password 
        $temp_password = 'password';
        //Image Upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = 'agent/images/' . date('YmdHi') . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('agent/images/'), $photoName);
        }



        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $temp_password,
            'photo' => $photoName,
            'role' => 'agent',
            'status' => 'inactive',
        ]);

        event(new Registered($user));
        
        $notification = array(
            'message' => 'User Create successful',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.users.index')->with($notification);
    }
    //AllUserEdit
    public function AllUserEdit($id)
    {
        $user = User::find($id);
        return view('admin.backend.alluser.edit',compact('user'));
    }
    //AllUserUpdate
    public function AllUserUpdate(Request $request,$id)
    {
        //Image Upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = 'agent/images/' . date('YmdHi') . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('agent/images/'), $photoName);
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->photo = $photoName;
        $user->save();
        $notification = array(
            'message' => 'User Update successful',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.users.index')->with($notification);
    }
    //AllUserDelete
    public function AllUserDelete($id)
    {
        $user = User::find($id);
        //remove photo
        if ($user->photo) {
            unlink(public_path('agent/images/' . $user->photo));
        }
        $user->delete();
        $notification = array(
            'message' => 'User Delete successful',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.users.index')->with($notification);
    }
}
