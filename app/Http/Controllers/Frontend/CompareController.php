<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Compare;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class CompareController extends Controller
{
    //AddToCompare
    public function AddToCompare(Request $request,$property_id){
        // dd($property_id);
         if(Auth::check()){
            $compare_check = Compare::where('user_id',Auth::id())->where('property_id',$property_id)->first();
            if($compare_check){
                $compare_check->delete();
                return response()->json(['error' => 'Compare Item Removed']);
            }else{
                $compare = new Compare();
                $compare->user_id = Auth::id();
                $compare->property_id = $property_id;
                $compare->created_at = Carbon::now();
                $compare->save();
                return response()->json(['success' => 'Compare Item Added']);
            }
        }else{
            return response()->json(['error' => 'Login to Add Compare']);
        }
    }
    //UserCompare
    public function UserCompare(){
        $compares = Compare::where('user_id',Auth::id())->get();
        return view('frontend.compare.user_compare',compact('compares'));
    }
    //GetCompareProperties
    public function GetCompareProperties(){
        $compares = Compare::with('property')->with('user')->where('user_id',Auth::id())->get();
        // dd($compares);
        $comparesQty = Compare::count();
        return response()->json(['compares' => $compares,'comparesQty' => $comparesQty]);
    }
}
