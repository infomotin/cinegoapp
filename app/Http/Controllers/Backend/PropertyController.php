<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Property;
use App\Models\Backend\FacilityProperty;
use App\Models\Backend\MultiImageProperty;
use App\Models\Admin\Backend\PropertyType;
use App\Models\Admin\Backend\Amenities;

class PropertyController extends Controller
{
    //PropertyIndex
    public function PropertyIndex()
    {
        $properties = Property::latest()->get();
        return view('backend.property.index', compact('properties'));
        // return view('backend.property.index');
    }
    //PropertyCreate
    public function PropertyCreate()
    {
        $property_types = PropertyType::all();
        $amenities = Amenities::all();
        return view('backend.property.create', compact('property_types', 'amenities'));
    }
}
