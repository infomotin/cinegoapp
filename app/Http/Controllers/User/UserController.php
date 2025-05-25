<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Index
    public function Index()
    {
        return view('frontend.index');
    }
    //UserProfile 
    public function UserProfile()
    {   
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.dashboard.profile',compact('user'));
    }
    //UserProfileEdit
    public function UserProfileEdit(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'phone' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);

        // dd($user);
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($user->photo) {
                $oldPhotoPath = public_path('user/images/' . $user->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            // Store the new photo
            $photo = $request->file('photo');
            $photoName = 'user/images/'. date('YmdHi') .'.'. $photo->getClientOriginalExtension();
            // dd($photoName);
            $photo->move(public_path('user/images/'), $photoName);
            // Update the user's photo path
            $user->photo = $photoName;
        }



        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->photo = $request->photo;
        $user->save();
        $notification = array(
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //UserChangePassword
    public function UserChangePassword()
    {

        return view('frontend.dashboard.change-password');
    }
    //UserChangePasswordStore
    public function UserChangePasswordStore(Request $request)
    {
    //    dd($request->all());
        // $request->validate([
        //     'old_password' => 'required',
        //     'new_password' => 'required|min:8|confirmed',
        // ]);
        // Get the authenticated user
        $id = Auth::user()->id;
        $user = User::find($id);
        // Check if the old password is correct
        if (!Hash::check($request->input('old_password'), $user->password)) {
            $notification = array(
                'message' => 'Old password is incorrect',
                'alert-type' => 'error'
            );
            // Redirect back with error message
            return redirect()->back()->with($notification);
            
        }
        // Update the password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        //Notification 
        $notification = array(
            'message' => 'Password changed successfully',
            'alert-type' => 'success'
        );
        // logout the user
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with($notification);
    }
    //UserLogout
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout successfully',
            'alert-type' => 'success'
        );

        return redirect('/')->with($notification);
    }
}
