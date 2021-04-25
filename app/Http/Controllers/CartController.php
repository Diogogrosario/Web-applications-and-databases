<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class CartController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.cart')->with("user", $user)->with("categories", $categories);
    }
}
