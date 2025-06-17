<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    //DeveloperDashboard
    public function DeveloperDashboard()
    {
        return view('developer.index');
    }
}
