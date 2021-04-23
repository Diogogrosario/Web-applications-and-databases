<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;

class SearchResultsController extends Controller
{
    public function show()
    {
        $q = request()->query('search');
        $searchResults =  Item::whereRaw('item.search @@ to_tsquery(\'english\', ?)', array(strtolower($q)))
        ->orderByRaw('ts_rank(item.search, to_tsquery(\'english\', ?)) DESC', array(strtolower($q)))->get();

        $categories = Category::all();

    //    return $items;
        return view("pages.searchResults")->with("searchResults",$searchResults)->with("categories",$categories);
    }
}
