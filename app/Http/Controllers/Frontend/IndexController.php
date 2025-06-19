<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Property;
use App\Models\Backend\FacilityProperty;
use App\Models\Backend\MultiImageProperty;
use App\Models\Admin\Backend\PropertyType;
use App\Models\Admin\Backend\Amenities;
use App\Models\User;

class IndexController extends Controller
{
    //PropertyDetails
    public function PropertyDetails($id, $slug)
    {
        $property = Property::findOrFail($id);
        $property_types = PropertyType::all();
        $atype = $property->amenities_id;
        $amenities_id = explode(',', $atype);
        $amenities = Amenities::all();
        $agents = User::where('role', 'agent')->where('status', 'active')->get();
        $multiImage  = MultiImageProperty::where('property_id', $id)->limit(3)->get();
        $facilities = FacilityProperty::where('property_id', $id)->get();

        return view('frontend.property.property_details', compact('property', 'property_types', 'amenities', 'agents', 'multiImage', 'facilities', 'amenities_id'));
    }
    //PropertyState
    public function PropertyState($state)
    {
        $properties = Property::where('street_name', $state)->paginate(3);


        return view('frontend.property.property_state', compact('properties'));
    }
    //AgentDetails
    public function AgentDetails($id)
    {
        $agent = User::with('properties')->findOrFail($id);
        return view('frontend.agent.agent_details', compact('agent'));
    }
    //PropertyIndex
    public function PropertyIndex()
    {
        $properties = Property::latest()->paginate(3);
        
        return view('frontend.property.property_index', compact('properties'));
    }
    //PropertyType
    public function PropertyType($id)
    {
        $properties = Property::where('ptype_id', $id)->paginate(3);
        $property_types = PropertyType::where('id', $id)->first();
        // dd($property_types.type_name);
        return view('frontend.property.property_type_index', compact('properties', 'property_types'));
    }
 
}