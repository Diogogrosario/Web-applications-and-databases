<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Category;

class ItemPageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $categories = Category::all()->orderBy("category_id");
        
        return view('pages.itemPage')->with('item', $item)->with("categories", $categories);
    }
}
