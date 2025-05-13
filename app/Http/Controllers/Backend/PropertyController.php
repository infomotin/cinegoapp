<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Property;
use App\Models\Backend\FacilityProperty;
use App\Models\Backend\MultiImageProperty;
use App\Models\Admin\Backend\PropertyType;
use App\Models\Admin\Backend\Amenities;
use App\Models\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;


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
        $agents = User::where('role', 'agent')->where('status', 'active')->get();
        return view('backend.property.create', compact('property_types', 'amenities', 'agents'));
    }
    //PropertyStore
    public function PropertyStore(Request $request)
    {
    //    dd($request->property_status);
       $amenities = $request->amenities_id;
       
        $amenities_id = implode(",", $amenities);
        //property_code
        $pcode = IdGenerator::generate([
            'table' => 'properties',
            'field' => 'property_code',
            'length' => 10,
            'prefix' => date('y'),
            'reset_on_prefix_change' => true
        ]);

       $image = $request->file('property_thambnail');
       $imane_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(370, 250)->save('upload/property/thambnail/'.$imane_name);
       $save_url = 'upload/property/thambnail/'.$imane_name;
        
       $property_id = Property::insertGetId([
            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenities_id,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_code' => $pcode,
            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'property_thambnail' => $save_url,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,
            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'city_name' => $request->city_name,
            'street_name' => $request->street_name,
            'street_number' => $request->street_number,
            'building_name' => $request->building_name,
            'apartment_number' => $request->apartment_number,
            'floor_number' => $request->floor_number,
            'landmark' => $request->landmark,
            'state_code' => $request->state_code,
            'state_name' => $request->state_name,
            'country_code' => $request->country_code,
            'country_name' => $request->country_name,
            'zip_code' => $request->zip_code,
            'street_address' => $request->street_address,
            'street_address2' => $request->street_address2, 
            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'agent_id' => $request->agent_id,
            'status' => 0,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
            'deleted_by' => null,
            'deleted_at' => null,
            'deleted_reason' => null,
            'deleted_status' => null,
            'view_count' => 0,
            'like_count' => 0,
            'dislike_count' => 0,
            'comment_count' => 0,
            'share_count' => 0,
            'save_count' => 0,
            'report_count' => 0,
            'favorite_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //PropertyFacility
        // if ($request->facility_name) {
        //     foreach ($request->facility_name as $key => $value) {
        //         FacilityProperty::insert([
        //             'property_id' => $property_id,
        //             'facility_name' => $request->facility_distance[$key],
        //             'facility_distance' => $request->facility_distance[$key],
        //             'created_at' => now(),
        //         ]);
        //     }
        // }

        $facility_count = count($request->facility_name);
        if ($facility_count > 0) {
            for ($i = 0; $i < $facility_count; $i++) {
                FacilityProperty::insert([
                    'property_id' => $property_id,
                    'facility_name' => $request->facility_name[$i],
                    'facility_distance' => $request->distance[$i],
                ]);
            }
        }
        //MultiImage
        if ($request->file('multi_img')) {
            foreach ($request->file('multi_img') as $image) {
                $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(750, 520)->save('upload/property/multi_image/'.$image_name);
                MultiImageProperty::insert([
                    'property_id' => $property_id,
                    'photo_name' => 'upload/property/multi_image/'.$image_name,
                    'photo_slug' => strtolower(str_replace(' ', '-', $image_name)),
                    'created_at' => now(),
                ]);
            }
        }
        $notification = array(
            'message' => 'Property Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.property.index')->with($notification);
    }
    //PropertyEdit
    public function PropertyEdit($id)
    {
        $property = Property::findOrFail($id);
        $property_types = PropertyType::all();
        $amenities = Amenities::all();
        $agents = User::where('role', 'agent')->where('status', 'active')->get();
        $multiImage  = MultiImageProperty::where('property_id', $id)->get();
        $facilities = FacilityProperty::where('property_id', $id)->get();
        return view('backend.property.edit', compact('property', 'property_types', 'amenities', 'agents', 'multiImage', 'facilities'));
    }
}
