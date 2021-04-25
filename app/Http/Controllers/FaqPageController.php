<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FaqPageController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.faq')->with("categories", $categories);
    }
}
