<?php

namespace App\Http\Controllers\Admin\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Backend\Address\Country;
use App\Models\Admin\Backend\Address\Division;
use App\Models\Admin\Backend\Address\District;
use App\Models\Admin\Backend\Address\Zone;
use App\Models\Admin\Backend\Address\City;
use App\Models\Admin\Backend\Address\PoliceStation;
use App\Models\Admin\Backend\Address\Landmark;
use App\Models\Admin\Backend\Address\Word;
use App\Models\Admin\Backend\Address\Road;

class AddressController extends Controller
{
    //AdminAddressInbex
    public function AdminAddressInbex()
    {
        $countries  = Country::all();
        return view('admin.backend.address.index', compact('countries'));
    }
    //AdminAddressCreate
    public function AdminAddressCreate()
    {
        // dd('AdminAddressCreate');
        return view('admin.backend.address.create');
    }
    //AdminAddressStore
    public function AdminAddressStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:countries',
        ]);
        if ($request->hasFile('flaug')) {
            $flaug = $request->file('flaug');
            $flaugName = 'country/flaug/' . date('YmdHi') . '.' . $flaug->getClientOriginalExtension();
            $flaug->move(public_path('country/flaug/'), $flaugName);
            $request->merge(['flaug' => $flaugName]);
        }
        $country = new Country();
        $country->name = $request->name;
        $country->flag = $flaugName;
        $country->save();


        $notification = array(
            'message' => 'Country created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.address.index')->with($notification);
    }
    //AdminDivisionInbex
    public function AdminDivisionInbex(){
        $divisions = Division::with('country')->get();
        return view('admin.backend.address.division_index',compact('divisions'));
    }
    //AdminDivisionCreate
    public function AdminDivisionCreate(){
        return view('admin.backend.address.division_create');
    }
    //AdminDivisionStore
    public function AdminDivisionStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:divisions',
            'country_id' => 'required',
        ]);
        $division = new Division();
        $division->name = $request->name;
        $division->country_id = $request->country_id;
        $division->save();
        $notification = array(
            'message' => 'Division created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.address.division_index')->with($notification);
    }

    //AdminDistrictInbex
    public function AdminDistrictInbex(){
        //return noftification Working fine
        $notification = array(
            'message' => 'District created successfully',
            'alert-type' => 'success'   
        );
        return redirect()->route('admin.backend.address.index')->with($notification);
        // return view('admin.backend.address.district_index');
    }
    //AdminDistrictCreate
    public function AdminDistrictCreate(){
        return view('admin.backend.address.district_create');
    }
    //AdminDistrictStore
    public function AdminDistrictStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:districts',
            'division_id' => 'required',
        ]);
        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();
        $notification = array(
            'message' => 'District created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.address.district_index')->with($notification);
    }
    //AdminZoneInbex
    public function AdminZoneInbex(){
          $notification = array(
            'message' => 'District created successfully',
            'alert-type' => 'success'   
        );
        return redirect()->route('admin.backend.address.index')->with($notification);
        return view('admin.backend.address.zone_index');
    }
    //AdminZoneCreate
    public function AdminZoneCreate(){
        return view('admin.backend.address.zone_create');
    }
    //AdminZoneStore
    public function AdminZoneStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:zones',
            'district_id' => 'required',
        ]);
        $zone = new Zone();
        $zone->name = $request->name;
        $zone->district_id = $request->district_id;
        $zone->save();
        $notification = array(
            'message' => 'Zone created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.address.zone_index')->with($notification);
    }
    //AdminCityInbex
    public function AdminCityInbex(){
          $notification = array(
            'message' => 'District created successfully',
            'alert-type' => 'success'   
        );
        return redirect()->route('admin.backend.address.index')->with($notification);
        return view('admin.backend.address.city_index');
    }
    //AdminCityCreate
    public function AdminCityCreate(){
        return view('admin.backend.address.city_create');
    }
    //AdminCityStore
    public function AdminCityStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:cities',
            'zone_id' => 'required',
        ]);
        $city = new City();
        $city->name = $request->name;
        $city->zone_id = $request->zone_id;
        $city->save();
        $notification = array(
            'message' => 'City created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.address.city_index')->with($notification);
    }
    //AdminPoliceInbex
    public function AdminPoliceInbex(){
          $notification = array(
            'message' => 'District created successfully',
            'alert-type' => 'success'   
        );
        return redirect()->route('admin.backend.address.index')->with($notification);
        return view('admin.backend.address.police_index');
    }
    //AdminPoliceCreate
    public function AdminPoliceCreate(){
        return view('admin.backend.address.police_create');
    }
    //AdminPoliceStore
    public function AdminPoliceStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:polices',
            'city_id' => 'required',
        ]);
        $police = new PoliceStation();
        $police->name = $request->name;
        $police->city_id = $request->city_id;
        $police->save();
        $notification = array(
            'message' => 'Police created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.address.police_index')->with($notification);
    }
    //AdminLandmarkInbex
    public function AdminLandmarkInbex(){
          $notification = array(
            'message' => 'District created successfully',
            'alert-type' => 'success'   
        );
        return redirect()->route('admin.backend.address.index')->with($notification);
        return view('admin.backend.address.landmark_index');
    }
    //AdminLandmarkCreate
    public function AdminLandmarkCreate(){
        return view('admin.backend.address.landmark_create');
    }
    //AdminLandmarkStore
    public function AdminLandmarkStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:landmarks',
            'police_id' => 'required',
        ]);
        $landmark = new Landmark();
        $landmark->name = $request->name;
        $landmark->police_id = $request->police_id;
        $landmark->save();
        $notification = array(
            'message' => 'Landmark created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.address.landmark_index')->with($notification);
    }
    //AdminWordInbex
    public function AdminWordInbex(){
          $notification = array(
            'message' => 'District created successfully',
            'alert-type' => 'success'   
        );
        return redirect()->route('admin.backend.address.index')->with($notification);
        return view('admin.backend.address.word_index');
    }
    //AdminWordCreate
    public function AdminWordCreate(){
        return view('admin.backend.address.word_create');
    }
    //AdminWordStore
    public function AdminWordStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:words',
            'landmark_id' => 'required',
        ]);
        $word = new Word();
        $word->name = $request->name;
        $word->landmark_id = $request->landmark_id;
        $word->save();
        $notification = array(
            'message' => 'Word created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.address.word_index')->with($notification);
    }
    //AdminRoadInbex
    public function AdminRoadInbex(){
          $notification = array(
            'message' => 'District created successfully',
            'alert-type' => 'success'   
        );
        return redirect()->route('admin.backend.address.index')->with($notification);
        return view('admin.backend.address.road_index');
    }
    //AdminRoadCreate
    public function AdminRoadCreate(){
        return view('admin.backend.address.road_create');
    }
    //AdminRoadStore
    public function AdminRoadStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:roads',
            'word_id' => 'required',
        ]);
        $road = new Road();
        $road->name = $request->name;
        $road->word_id = $request->word_id;
        $road->save();
        $notification = array(
            'message' => 'Road created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.backend.address.road_index')->with($notification);
    }
}
