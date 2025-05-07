<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    public function AdminProfile()
    {
        // Get the authenticated user
        $id = Auth::user()->id;
        $user = User::find($id);
        // Pass the user data to the view

        return view('admin.profile', compact('user'));
    }
    //AdminProfileUpdate
    public function AdminProfileUpdate(Request $request)
    {
        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
            // 'phone' => 'required|string|max:15',
            // 'username' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Get the authenticated user
        $id = Auth::user()->id;
        $user = User::find($id);

        // Check if a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($user->photo) {
                $oldPhotoPath = public_path('admin/images/' . $user->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            // Store the new photo
            $photo = $request->file('photo');
            $photoName = 'admin/images/' . date('YmdHi') . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('admin/images/'), $photoName);
            // Update the user's photo path
            $user->photo = $photoName;
        }



        // Update the user data
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->phone = $request->input('phone');
        // $user->username = $request->input('username');
        // Save the changes
        $user->save();
        //Notification 
        $notification = array(
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        );
        // Redirect back with success message
        return redirect()->back()->with($notification);
    }
    // AdminChangePassword
    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.change-password', compact('user'));
    }
    //AdminChangePasswordSubmit
    public function AdminChangePasswordSubmit(Request $request)
    {
        // dd($request->all());
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
        return redirect('/admin/login')->with($notification);
        // return redirect()->back()->with($notification);
    }
    //AdminLogin
    public function AdminLogin()
    {
        return view('admin.login');
    }
    //AdminSubmit
    public function AdminSubmit(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // Check if the login is an email or username or phone number
        $user = User::where('email', $request->input('login'))
            ->orWhere('username', $request->input('login'))
            ->orWhere('phone', $request->input('login'))
            ->first();
        // Check if the user exists and the password is correct
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            RateLimiter::hit($this->throttleKey());
            return redirect()->back()->with('error', 'Invalid credentials');
        }
        // Check if the user is an admin
        if ($user->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not authorized to access this page');
        }
        // Log the user in
        Auth::login($user);
        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();
        // Redirect to the admin dashboard
        return redirect()->route('admin.dashboard')->with('success', 'Login successful');
    }
    //AdminProfile

    //AdminLogout
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //Notification
        $notification = array(
            'message' => 'Logout successfully',
            'alert-type' => 'success'
        );
        // Redirect back with success message
        return redirect('/admin/login')->with($notification);

        
    }
}
