<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StuffController extends Controller
{
    //StuffDashboard
    public function StuffDashboard()
    {
        return view('stuff.index');
    }
}
