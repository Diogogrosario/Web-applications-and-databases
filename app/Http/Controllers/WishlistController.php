<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.wishlist')->with("user", $user)->with("categories", $categories);
    }

    public function showSelf()
    {
        $user = Auth::user();

        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.wishlist')->with("user", $user)->with("categories", $categories);
    }

    public function addToWishlist(Request $request)
    {
        $item_id = $request->all()['item_id'];
        $user_id = Auth::user()["user_id"];

        if($user_id == null) {
            return response()->json("Unauthenticated user cannot add item to wishlist.", 401);
        }

        if(DB::table('wishlist')->where('user_id', '=', $user_id)->where('item_id', '=', $item_id)->count() == 0) {
            if(DB::table('wishlist')->insert(['user_id' => $user_id, 'item_id' => $item_id]))
                return response()->json("Item added to wishlist successfuly", 200);
            return response()->json("Item could not be added to wishlist", 406);
        }
        else 
            return response()->json("Item already in the user's wishlist", 406);
    }

    public function removeFromWishlist($id)
    {  
        $user_id = Auth::user()['user_id'];

        if($user_id == null) {
            return response()->json("Unauthenticated user cannot removed item from wishlist.", 401);
        }
        $deleted = DB::table('wishlist')->where('user_id', '=', $user_id)->where('item_id', '=', $id)->delete();

        if($deleted > 0)
            return response()->json("Item removed from wishlist successfuly.", 200);
        else 
            return response()->json("Item is not in the user's wishlist.", 406);
    }
}
