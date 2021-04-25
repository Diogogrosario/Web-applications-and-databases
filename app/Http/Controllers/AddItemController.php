<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AddItemController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.addItem')->with("categories", $categories);
    }
}
