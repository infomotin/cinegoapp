<?php

namespace App\Http\Controllers\Admin\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //AdminAddressInbex
    public function AdminAddressInbex()
    {
        // dd('AdminAddressInbex');
        return view('admin.backend.address.index');
    }
}
