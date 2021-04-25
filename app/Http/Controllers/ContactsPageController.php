<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class ContactsPageController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.contacts')->with("categories", $categories);
    }
}
