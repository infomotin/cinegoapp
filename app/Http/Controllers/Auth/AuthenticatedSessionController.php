<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // $id = auth()->user()->id;
        // $user = User::find($id);
        // $userName = $user->username;
        
        $notification = array(
            'message' => 'Welcome back, ' . '$userName',
            'alert-type' => 'info'
        );
        // dd($request->all());
        $request->authenticate();
        $request->session()->regenerate();
        //decide where to redirect after login 
        $url = '';
        //check if user is admin
        if($request->user()->role === 'admin'){
            $url = '/admin/dashboard';
        }else if($request->user()->role === 'agent'){
            $url = '/agent/dashboard';
        }
        else if($request->user()->role === 'developer'){
            $url = '/developer/dashboard';
        }
        else if($request->user()->role === 'client'){
            $url = '/client/dashboard';
        }
        else if($request->user()->role === 'stuff'){
            $url = '/stuff/dashboard';
        }else if($request->user()->role === 'user'){
            $url = '/dashboard';
        }else {
            $url = '/';
        }
        // dd($url);
        // return redirect()->intended(RouteServiceProvider::HOME);
        return redirect()->intended($url)->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
