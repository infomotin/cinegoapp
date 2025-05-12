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
    //AmenitiesEdit
    public function AmenitiesEdit($id)
    {
        $amenities = Amenities::findOrFail($id);
        return view('admin.backend.amenities.edit', compact('amenities'));
    }
    //AmenitiesUpdate
    public function AmenitiesUpdate(Request $request, $id)
    {
        $request->validate([
            'amenities_name' => 'required',
        ]);

        Amenities::findOrFail($id)->update([
            'amenities_name' => $request->amenities_name,
        ]);
        $notification = array(
            'message' => 'Amenities updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.amenities.index')->with($notification);
    }
    //AmenitiesDelete
    public function AmenitiesDelete($id)
    {
        Amenities::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Amenities deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.amenities.index')->with($notification);
    }
}
