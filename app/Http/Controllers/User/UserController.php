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
}
