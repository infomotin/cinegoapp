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
    public function AllUserActiveInactive($id)
    {
        $user = User::find($id);
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();
        return back();
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
}
