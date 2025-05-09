<?php

namespace App\Http\Controllers\Admin\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Backend\Amenities;

class AmenitieController extends Controller
{
    //AmenitiesIndex
    public function AmenitiesIndex()
    {
        $amenities = Amenities::all();
        return view('admin.backend.amenities.index', compact('amenities'));
    }
    //AmenitiesCreate
    public function AmenitiesCreate()
    {
        return view('admin.backend.amenities.create');
    }
    //AmenitiesStore
    public function AmenitiesStore(Request $request)
    {
        $request->validate([
            'amenities_name' => 'required',
        ]);

        Amenities::create([
            'amenities_name' => $request->amenities_name,
        ]);
        $notification = array(
            'message' => 'Amenities created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.amenities.index')->with($notification);
        
    }
}
