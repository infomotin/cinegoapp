<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Index
    public function Index()
    {
        return view('frontend.frontend_dashboard');
    }
}
