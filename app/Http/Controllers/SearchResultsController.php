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
            $searchResults = $searchResults->where("is_archived",false)->get();
        }
        else
            $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
            ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)
            ->get();

        

        $categories = Category::all()->sortBy("category_id");

    //    return $items;
        return view("pages.searchResults")->with("searchResults",$searchResults)->with("categories",$categories);
    }

    public function showAjax(Request $request)
    {
        $data = $request->all();
        if(isset($data['priceRanges'])){
            $priceRanges = preg_split('/[,]/', $data['priceRanges']);
            

            //$prices = preg_split("~-~", $priceRanges);
            $min_price = "0";
            $max_price = "50";

            $priceQuerryString = "(";



            for($i = 0; $i < count($priceRanges) - 1; $i+=2){
                
                if(mb_strlen($priceRanges[$i+1]) == 0){
                    $priceQuerryString .= "(price > " . $priceRanges[$i] . "::money)";
                }
                /*else if($priceRanges[$i] == 0){
                    $priceQuerryString .= "(price < " . $priceRanges[$i + 1] . "::money)";
                }*/
                else{
                    $priceQuerryString .= "((price > " . $priceRanges[$i] . "::money) AND (price < " . $priceRanges[$i+1] . "::money))";
                    if(($i < count($priceRanges) - 1 - 2)){
                        $priceQuerryString .= "OR";
                    }
                }
            }
            $priceQuerryString .= ")";
            //->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->
           

        }

        $q = $data['search'];
        $cat = $data['category'];

        $filteredByCat;
        if(isset($data['priceRanges'])){
            if($cat!=null && $cat!=-1){
                $searchResults =  Item::where("category_id",$cat);
                if($q!=null)
                    $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))->whereRaw($priceQuerryString)
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                $searchResults = $searchResults->where("is_archived",false)->get();
            }
            else
                $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($priceQuerryString)
                ->get();
    
        }
        else{
            if($cat!=null && $cat!=-1){
                $searchResults =  Item::where("category_id",$cat);
                if($q!=null)
                    $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                $searchResults = $searchResults->where("is_archived",false)->get();
            }
            else
                $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)
                ->get();
        }

        

        

        $categories = Category::all()->sortBy("category_id");

        //    return $items;
        //view("pages.searchResults")->with("searchResults",$searchResults)->with("categories",$categories);
        return view("partials.searchResultList")->with("searchResults", $searchResults);
    }

}
