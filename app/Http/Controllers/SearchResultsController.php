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
            


            $priceQuerryString = "(";



            for($i = 0; $i < count($priceRanges) - 1; $i+=2){
                
                if(mb_strlen($priceRanges[$i+1]) == 0){
                    $priceQuerryString .= "(price > " . $priceRanges[$i] . "::money)";
                }
                /*else if($priceRanges[$i] == 0){
                    $priceQuerryString .= "(price < " . $priceRanges[$i + 1] . "::money)";
                }*/
                else{
                    $priceQuerryString .= "((price > " . $priceRanges[$i] . "::money) AND (price <= " . $priceRanges[$i+1] . "::money))";
                    if(($i < count($priceRanges) - 1 - 2)){
                        $priceQuerryString .= "OR";
                    }
                }
            }
            $priceQuerryString .= ")";
            //->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->
           

        }

        if(isset($data['starRatings'])){
            $starRatings = preg_split('/[,]/', $data['starRatings']);

            $starRatingsString = "(";

            for($i = 0; $i < count($starRatings) - 1; $i+=2){
                $starRatingsString .= "((score >= " . $starRatings[$i] . ") AND (score <= " . $starRatings[$i+1] . "))";
                if(($i < count($starRatings) - 1 - 2)){
                    $starRatingsString .= "OR";
                }
            }
            
            $starRatingsString .= ")";

        }





        if(isset($data['search'])){
            $q = $data['search'];
        }
        else{
            $q = null;
        }
        
        if(isset($data['category'])){
            $cat = preg_split('/[,]/', $data['category']);
            $catString = "(";
            $catString .= "category_id = " . $cat[0];
            
            for($i = 1; $i < count($cat); $i++){
                $catString .= " OR category_id = " . $cat[$i];
            }
            
            $catString .= ")";
        }
        else{
            $cat = -1;
        }

        $filteredByCat;
        if(isset($data['starRatings'])){
            if(isset($data['priceRanges'])){
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);//("category_id",$cat);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))->whereRaw($priceQuerryString)
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false)->whereRaw($priceQuerryString)->whereRaw($starRatingsString)->get();
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($priceQuerryString)->whereRaw($starRatingsString)
                    ->get();
                }
                else{
                    $searchResults = Item::where("is_archived",false)->whereRaw($priceQuerryString)->whereRaw($starRatingsString)->get();
                }
            }
            else{
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false)->whereRaw($starRatingsString)->get();
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($starRatingsString)
                    ->get();
                }
                else{
                    $searchResults = Item::where("is_archived",false)->whereRaw($starRatingsString)->whereRaw($starRatingsString)->get();
                }
            }
        }
        else{
            if(isset($data['priceRanges'])){
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false)->whereRaw($priceQuerryString)->get();
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($priceQuerryString)
                    ->get();
                }
                else{
                    $searchResults = Item::where("is_archived",false)->whereRaw($priceQuerryString)->get();
                }
        
            }
            else{
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false)->get();
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)
                    ->get();
                }
                else{
                    $searchResults = Item::where("is_archived",false)->get();
                }
            }
        }
        

        

        $categories = Category::all()->sortBy("category_id");

        //    return $items;
        return view("partials.searchResultList")->with("searchResults", $searchResults);
    }

}
