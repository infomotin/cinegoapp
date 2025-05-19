<?php

namespace App\Http\Controllers\Admin\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
}
