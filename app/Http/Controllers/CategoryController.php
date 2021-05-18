<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Details;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string $category
     * @return \Illuminate\Http\Response
     */
    
    public function show($category_id)
    {
       $category = Category::find($category_id);
       return $category;
    }

    public function getDetails($category_id){

        $category = Category::find($category_id);
        $category_details =  $category->details();
        
        return view("partials.addItemCategoryDetails")->with("details",$category_details->get());
        //return $category_details->get();
    }
}
