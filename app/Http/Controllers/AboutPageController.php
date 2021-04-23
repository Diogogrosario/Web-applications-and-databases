<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class AboutPageController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        
        return view('pages.about')->with("categories", $categories);
    }
}
