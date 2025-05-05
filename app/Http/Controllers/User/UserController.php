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
}
