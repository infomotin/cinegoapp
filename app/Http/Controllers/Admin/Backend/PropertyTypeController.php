<?php

namespace App\Http\Controllers\Admin\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Backend\PropertyType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PropertyTypeController extends Controller
{
    //PropertyTypeIndex
    public function PropertyTypeIndex()
    {
        $property_types = PropertyType::all();
        return view('admin.backend.property_type.index', compact('property_types'));
    }
    //PropertyTypeCreate
    public function PropertyTypeCreate()
    {
        return view('admin.backend.property_type.create');
    }
    //PropertyTypeStore
    public function PropertyTypeStore(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:property_types|max:100',
            'icon' => 'required',
            // 'image' => 'required',
        ]);

        PropertyType::create([
            'type_name' => $request->type_name,
            'slug' => Str::slug($request->type_name),
            'icon' => $request->icon,
            // 'image' => $request->image,
            'status' => 'active',
            // 'created_by' => Auth::user()->id,
        ]);
        $notification = array(
            'message' => 'Property Type Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.property_type.index')->with($notification);
        // return redirect()->back()->with($notification);
    }
    //PropertyTypeEdit
    public function PropertyTypeEdit($id)
    {
        $property_type = PropertyType::findOrFail($id);
        return view('admin.backend.property_type.edit', compact('property_type'));
    }
    //PropertyTypeUpdate
    public function PropertyTypeUpdate(Request $request, $id)
    {
        $property_type = PropertyType::findOrFail($id);
        $request->validate([
            'type_name' => 'required|max:100|unique:property_types,type_name,' . $property_type->id,
            'icon' => 'required',
            // 'image' => 'required',
        ]);

        $property_type->update([
            'type_name' => $request->type_name,
            'slug' => Str::slug($request->type_name),
            'icon' => $request->icon,
            // 'image' => $request->image,
            // 'updated_by' => Auth::user()->id,
        ]);
        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.property_type.index')->with($notification);
    }
    //PropertyTypeDelete
    public function PropertyTypeDelete($id)
    {
        $property_type = PropertyType::findOrFail($id);
        $property_type->delete();
        $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.property_type.index')->with($notification);
    }
    //PropertyTypeStatus
}
