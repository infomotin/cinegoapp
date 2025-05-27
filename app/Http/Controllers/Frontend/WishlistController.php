<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Frontend\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //AddToWishlist
    public function AddToWishlist(Request $request,$property_id)
    {
        if(Auth::check()){
            $wishlist_check = Wishlist::where('user_id',Auth::id())->where('property_id',$property_id)->first();
            if($wishlist_check){
                $wishlist_check->delete();
                return response()->json(['error' => 'Wishlist Item Removed']);
            }else{
                $wishlist = new Wishlist();
                $wishlist->user_id = Auth::id();
                $wishlist->property_id = $property_id;
                $wishlist->created_at = Carbon::now();
                $wishlist->save();
                return response()->json(['success' => 'Wishlist Item Added']);
            }
        }else{
            return response()->json(['error' => 'Login to Add Wishlist']);
        }
    }
    //UserWishlist
    public function UserWishlist()
    {
        $wishlists = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist.user_wishlist',compact('wishlists'));
    }
    //UserWishlistGrid
    public function UserWishlistGrid()
    {
        $wishlists = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist.user_wishlist_grid',compact('wishlists'));
    }
    //UserWishlistJson
    public function UserWishlistJson()
    {
        
         return view('frontend.wishlist.user_wishlist_grid_json');
    }
    //UserWishlistDelete
    public function GetWishlistProperties()
    { 
        
        $wishlists = Wishlist::with('property')->with('user')->where('user_id',Auth::id())->get();
        $wishListQty = Wishlist::count();
        // dd($wishListQty,$wishlists);
        return response()->json(['wishlists' => $wishlists,'wishListQty' => $wishListQty]);
    }
       

}
