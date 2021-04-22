<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;


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
       $item = Item::where("category_id",$category_id)->orderBy("item_id")->get();
       return $item;
    }
}
