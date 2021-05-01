<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Item;
use App\Models\User;
use App\Models\Category;

class UserProfileController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user))
        {
            abort(404);
        }
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.userProfile')->with("user", $user)->with("categories", $categories);
    }
}
