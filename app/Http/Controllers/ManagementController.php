<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class ManagementController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.management')->with("categories", $categories);
    }
}
