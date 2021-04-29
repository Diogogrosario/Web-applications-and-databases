<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.cart')->with("user", $user)->with("categories", $categories);
    }

    public function addToCart($id, $quantity) {

        if(Auth::user() == null) {
            return response()->json("Unauthenticated", 406);
        }

        return DB::transaction(function() use ($id, $quantity) {

            $item = Item::find($id);

            if($item["stock"] > 0) {
                return DB::select('call addToCart(?,?,?)', array(Auth::user()["user_id"], $id, $quantity));
            } else {
                return response()->json("Object has no stock", 406);
            }
        });
    }
}
