<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class HomepageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $items1 = Item::where("category_id",1)->orderBy("item_id")->get();
        $items2 = Item::where("category_id",2)->orderBy("item_id")->get();
        $categories = Category::all();
        return view('pages.homepage')->with('items1', $items1)->with('items2', $items2)->with('categories', $categories);
    }
}
