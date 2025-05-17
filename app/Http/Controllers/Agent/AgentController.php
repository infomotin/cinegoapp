<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Auth\Events\Registered;

class AgentController extends Controller
{
    public function AgentDashboard()
    {
        return view('agent.index');
    }
    //AgentLogin
    public function AgentLogin()
    {
        return view('agent.login');
    }
    //AgentSubmit
    public function AgentSubmit(Request $request)
    {
    //    dd($request->all());
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
        if ($user->role !== 'agent') {
            return redirect()->back()->with('error', 'You are not authorized to access this page');
        }
        // Log the user in
        Auth::login($user);
        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();
        // Redirect to the admin dashboard
        return redirect()->route('agent.dashboard')->with('success', 'Login successful');
    }
    //AgentRegisterSubmit
    public function AgentRegisterSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'agent',
            'status' => 'inactive',
        ]);

        event(new Registered($user));
        Auth::login($user);
        #
        $notification = array(
            'message' => 'Registration successful',
            'alert-type' => 'success'
        );
        return redirect(RouteServiceProvider::AGENT)->with($notification);
    }
    //AgentLogout
    public function AgentLogout(Request $request)
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
        return redirect('/agent/login')->with($notification);
    }
}
