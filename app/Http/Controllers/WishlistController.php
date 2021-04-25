<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Item;
use App\Models\User;
use App\Models\Category;

class WishlistController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.wishlist')->with("user", $user)->with("categories", $categories);
    }
}
