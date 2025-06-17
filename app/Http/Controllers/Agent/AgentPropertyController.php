<?php

namespace App\Http\Controllers\Agent;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Property;
use App\Models\Backend\FacilityProperty;
use App\Models\Backend\MultiImageProperty;
use App\Models\Admin\Backend\PropertyType;
use App\Models\Admin\Backend\Amenities;
use App\Models\Backend\PackagePlan;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class AgentPropertyController extends Controller
{
    //AgentPropertyIndex
    public function AgentPropertyIndex()
    {
        // Get the authenticated user
        $id = Auth::user()->id;
        $user = User::find($id);
        $properties = Property::where('agent_id', $id)->latest()->get();
        return view('agent.property.index', compact('properties'));
    }
    //AgentPropertyCreate
    public function AgentPropertyCreate()
    {
        $id = Auth::user()->id;
        $property_types = PropertyType::all();
        $amenities = Amenities::all();
        $agents = User::where('role', 'agent')->where('status', 'active')->where('id', $id)->get();

        $user = User::where('role', 'agent')->where('id', $id)->first();
        $user_cradit = $user->credit;
        // dd($user_cradit);
        if ($user_cradit == 1 || $user_cradit == 7) {
            $notification = array(
                'message' => 'You Don\'t Have Enough Credit',
                'alert-type' => 'error'
            );
            return redirect()->route('agent.buy.package')->with($notification);
        }else{
            return view('agent.property.create', compact('property_types', 'amenities', 'agents'));
        }

        
    }
    // -----------------------------------------
    //PropertyStore
    public function AgentPropertyStore(Request $request)
    {
        //AUTHENTICATION USER ID
        $aid = Auth::user()->id;
        $user = User::find($aid);
        $user_cradit = $user->credit;
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
        $imane_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 250)->save('upload/property/thambnail/' . $imane_name);
        $save_url = 'upload/property/thambnail/' . $imane_name;

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
                $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(750, 520)->save('upload/property/multi_image/' . $image_name);
                MultiImageProperty::insert([
                    'property_id' => $property_id,
                    'photo_name' => 'upload/property/multi_image/' . $image_name,
                    'photo_slug' => strtolower(str_replace(' ', '-', $image_name)),
                    'created_at' => now(),
                ]);
            }
        }
        User::where('id', $aid)->update([
            'credit' => DB::raw('1+' . $user_cradit),
        ]);
        $notification = array(
            'message' => 'Property Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('agent.property.index')->with($notification);
    }
    //PropertyEdit
    public function AgentPropertyEdit($id)
    {
        $property = Property::findOrFail($id);
        $property_types = PropertyType::all();
        $atype = $property->amenities_id;
        $amenities_id = explode(',', $atype);
        $amenities = Amenities::all();
        $agents = User::where('role', 'agent')->where('status', 'active')->get();
        $multiImage  = MultiImageProperty::where('property_id', $id)->get();
        $facilities = FacilityProperty::where('property_id', $id)->get();
        return view('agent.property.edit', compact('property', 'property_types', 'amenities', 'agents', 'multiImage', 'facilities', 'amenities_id'));
    }
    //PropertyUpdate
    public function AgentPropertyUpdate(Request $request, $id)
    {
        // dd($request->all());
        // $request->validate([
        //     'property_name' => 'required',
        //     'property_type_id' => 'required',
        //     'property_slug' => 'required',
        //     'amenities_id' => 'required',
        //     'agent_id' => 'required',
        //     'bedroom_number' => 'required',
        //     'bathroom_number' => 'required',
        //     'square_feet' => 'required',
        //     'price' => 'required',
        //     'description' => 'required',
        //     'address' => 'required',
        // ]);
        // dd($request->all());




        $property = Property::findOrFail($id);
        $property->ptype_id = $request->ptype_id;
        $property->amenities_id = implode(",", $request->amenities_id);
        $property->property_name = $request->property_name;
        $property->property_slug = strtolower(str_replace(' ', '-', $request->property_name));
        $property->property_status = $request->property_status;
        $property->lowest_price = $request->lowest_price;
        $property->max_price = $request->max_price;
        $property->short_descp = $request->short_descp;
        $property->long_descp = $request->long_descp;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->garage = $request->garage;
        $property->garage_size = $request->garage_size;
        $property->property_size = $request->property_size;
        $property->property_video = $request->property_video;
        $property->city_name = $request->city_name;
        $property->street_name = $request->street_name;
        $property->street_number = $request->street_number;
        $property->building_name = $request->building_name;
        $property->apartment_number = $request->apartment_number;
        $property->floor_number = $request->floor_number;
        $property->landmark = $request->landmark;
        $property->state_code = $request->state_code;
        $property->state_name = $request->state_name;
        $property->country_code = $request->country_code;
        $property->country_name = $request->country_name;
        $property->zip_code = $request->zip_code;
        $property->street_address = $request->street_address;
        $property->street_address2 = $request->street_address2;
        $property->neighborhood = $request->neighborhood;
        $property->latitude = $request->latitude;
        $property->longitude = $request->longitude;

        $property->hot = $request->hot;
        $property->featured = $request->featured;
        $property->agent_id = $request->agent_id;
        $property->status = 0;
        $property->created_by = auth()->user()->id;
        $property->updated_by = auth()->user()->id;
        $property->deleted_by = null;
        $property->deleted_at = null;
        $property->deleted_reason = null;
        $property->deleted_status = null;
        $property->save();
        $notification = array(
            'message' => 'Property Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('agent.property.index')->with($notification);
    }
    //PropertyThambnail
    public function AgentPropertyThambnailUpdate($id)
    {
        $property = Property::findOrFail($id);
        $old_image = $property->property_thambnail;
        if ($old_image) {
            unlink($old_image);
        }
        $image = request()->file('property_thambnail');
        $imane_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 250)->save('upload/property/thambnail/' . $imane_name);
        $save_url = 'upload/property/thambnail/' . $imane_name;
        $property->property_thambnail = $save_url;
        $property->save();
        $notification = array(
            'message' => 'Property Thambnail Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //PropertyMultiImage
    public function AgentPropertyMultiImage(Request $request)
    {
        $image = $request->multi_img;
        foreach ($image as $id => $img) {
            $imgDet = MultiImageProperty::findOrFail($id);
            $old_image = $imgDet->photo_name;
            if ($old_image) {
                unlink($old_image);
            }
            $image_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(750, 520)->save('upload/property/multi_image/' . $image_name);
            $save_url = 'upload/property/multi_image/' . $image_name;
            $imgDet->photo_name = $save_url;
            $imgDet->photo_slug = strtolower(str_replace(' ', '-', $image_name));
            $imgDet->save();
        }
        $notification = array(
            'message' => 'Property Multi Image Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //PropertyMultiImageDelete
    public function AgentPropertyMultiImageDelete($id)
    {
        $multi_image = MultiImageProperty::findOrFail($id);
        $image = $multi_image->photo_name;
        unlink($image);
        $multi_image->delete();
        $notification = array(
            'message' => 'Property Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //PropertyMultiImageAdd
    public function AgentPropertyMultiImageAdd(Request $request)
    {
        $image = $request->file('multi_img');
        foreach ($image as $img) {
            $image_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(750, 520)->save('upload/property/multi_image/' . $image_name);
            $save_url = 'upload/property/multi_image/' . $image_name;
            MultiImageProperty::insert([
                'property_id' => $request->property_id,
                'photo_name' => $save_url,
                'photo_slug' => strtolower(str_replace(' ', '-', $image_name)),
                'created_at' => now(),
            ]);
        }
        $notification = array(
            'message' => 'Property Multi Image Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //PropertyFacilityUpdate
    public function AgentPropertyFacilityUpdate(Request $request)
    {
        $property_id = $request->id;
        $facility_count = count($request->facility_name);
        if ($facility_count > 0) {
            FacilityProperty::where('property_id', $property_id)->delete();
            for ($i = 0; $i < $facility_count; $i++) {
                FacilityProperty::insert([
                    'property_id' => $property_id,
                    'facility_name' => $request->facility_name[$i],
                    'facility_distance' => $request->distance[$i],
                ]);
            }
        }
        $notification = array(
            'message' => 'Property Facility Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //PropertyShow
    public function AgentPropertyShow($id)
    {
        $property = Property::findOrFail($id);
        $property_types = PropertyType::all();
        $atype = $property->amenities_id;
        $amenities_id = explode(',', $atype);
        $amenities = Amenities::all();
        $agents = User::where('role', 'agent')->where('status', 'active')->get();
        $multiImage  = MultiImageProperty::where('property_id', $id)->get();
        $facilities = FacilityProperty::where('property_id', $id)->get();
        return view('agent.property.show', compact('property', 'property_types', 'amenities', 'agents', 'multiImage', 'facilities', 'amenities_id'));
    }
    //PropertyInactive
    public function AgentPropertyInactive(Request $request)
    {
        $id = $request->id;
        Property::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Property Inactive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    //PropertyActive
    public function AgentPropertyActive(Request $request)
    {
        $id = $request->id;
        Property::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Property Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //AgentBuyPackage 
    public function AgentBuyPackage()
    {
        return view('agent.package.buy_package');
    }
    //AgentPackageBuy
    public function AgentPackageBuy($package_name)
    {
        $id = Auth::user()->id;
        
        return view('agent.package.buy', compact('package_name', 'id'));
    }
    //AgentPackageBuyStore
    public function AgentPackageBuyStore(Request $request, $package_name)
    {
        // dd($package_name);
        if($package_name == 'business'){
            $id = Auth::user()->id;
            PackagePlan::insert([
                'user_id' => $id,
            'package_name' => 'business',
            'package_price' => 20,
            'package_duration' => '3',
            'invoice' => 'ERS'.mt_rand(10000, 99999),
            'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Package Buy Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('agent.property.index')->with($notification);
        }

        if($package_name == 'professional'){
            $id = Auth::user()->id;
            PackagePlan::insert([
            'user_id' => $id,
            'package_name' => 'professional',
            'package_price' => 100,
            'package_duration' => '50',
            'invoice' => 'ERS'.mt_rand(10000, 99999),
            'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Package Buy Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('agent.property.index')->with($notification);
        }
        if($package_name == 'basic'){
            $id = Auth::user()->id;
            PackagePlan::insert([
            'user_id' => $id,
            'package_name' => 'basic',
            'package_price' => 0,
            'package_duration' => '1',
            'invoice' => 'ERS'.mt_rand(10000, 99999),
            'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Package Buy Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('agent.property.index')->with($notification);
        }

        //AUTHENTICATION USER ID 
        $aid = Auth::user()->id;
        $user = User::find($aid);
        $user_cradit = $user->credit;
        // dd($user_cradit);
        if($package_name =='business'){
            User::where('id', $aid)->update([
            'credit' => DB::raw('3+' . $user_cradit),
        ]);
        }elseif($package_name == 'professional'){
            User::where('id', $aid)->update([
            'credit' => DB::raw('50+' . $user_cradit),
        ]);
        }elseif($package_name == 'basic'){
            User::where('id', $aid)->update([
            'credit' => DB::raw('1+' . $user_cradit),
        ]);
        }

        
        $notification = array(
            'message' => 'Package Buy Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('agent.property.index')->with($notification);
    }
}
