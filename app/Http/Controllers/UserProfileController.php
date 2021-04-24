<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Item;
use App\Models\User;
use App\Models\Category;

class UserProfileController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.userProfile')->with("categories", $categories);
    }
}
