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
        $exploded = explode("-",$id);

        $id = $exploded[count($exploded)-1];

        if(!is_numeric($id))
            abort(404);

        $item = Item::findOrFail($id);

        $url =  str_replace(" ","-",$item["name"]) . "-" . $id;
       
        $categories = Category::all()->sortBy("category_id");
        return view('pages.itemPage')->with('item', $item)->with("categories", $categories)->with("url",$url);
    }
}
