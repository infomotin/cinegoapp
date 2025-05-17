<?php

namespace App\Http\Controllers\Admin\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AllUserController extends Controller
{
    //AllUserIndex
    public function index()
    {
        $users = User::all();
        return view('admin.backend.alluser.index',compact('users'));
    }
}
