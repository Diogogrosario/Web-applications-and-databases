<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;

class SearchResultsController extends Controller
{
    public function show()
    {
        //->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->
        $q = request()->query('search');
        $cat = request()->query('category');

        $filteredByCat;
        if($cat!=null && $cat!=-1){
            $searchResults =  Item::where("category_id",$cat);
            if($q!=null)
                $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
            $searchResults = $searchResults->get();
        }
        else
            $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
            ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))
            ->get();

        

        $categories = Category::all()->sortBy("category_id");

    //    return $items;
        return view("pages.searchResults")->with("searchResults",$searchResults)->with("categories",$categories);
    }
}
