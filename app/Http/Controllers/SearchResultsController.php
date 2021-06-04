<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use Mockery\Undefined;

class SearchResultsController extends Controller
{

    public function showNotAjax(Request $request)
    {


        $step = request()->query('step');
        if(!is_numeric($step)){
            $step = 1;
        }
        $q = request()->query('search');
        $cate = request()->query('categories');
        $priceRngs = request()->query('priceRanges');
        $starRngs = request()->query('starRatings');

        if($priceRngs != null){
            $priceRanges = preg_split('/[ ]/', $priceRngs);


            $priceQuerryString = "(";

            for($i = 0; $i < count($priceRanges); $i++){
                $prices = preg_split('/[-]/', $priceRanges[$i]);
                if(count($prices) != 2){
                    //Ignorar price ranges
                    $priceRngs = null;
                    $priceQuerryString = "()";
                    break;
                }
                $priceMin = preg_split('/[-]/', $priceRanges[$i])[0];
                $priceMax = preg_split('/[-]/', $priceRanges[$i])[1];
                if((!is_numeric($priceMin)) || !is_numeric($priceMax)){
                    if(mb_strlen($priceMax) != 0 || $i != count($priceRanges) - 1){
                        //Ignorar price ranges
                        $priceRngs = null;
                        $priceQuerryString = "()";
                        break;
                    }
                }

                if(mb_strlen($priceMax) == 0){
                    $priceQuerryString .= "(price > " . $priceMin . "::money)";
                }
                else{
                    $priceQuerryString .= "((price > " . $priceMin . "::money) AND (price <= " . $priceMax. "::money))";
                    if(($i < count($priceRanges) - 1)){
                        $priceQuerryString .= "OR";
                    }
                }
            }
            $priceQuerryString .= ")";
            //->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->
           
        }

        if($starRngs != null){
            $starRatings = preg_split('/[ ]/', $starRngs);

            $starRatingsString = "(";

            for($i = 0; $i < count($starRatings); $i++){
                $priceMax = $starRatings[$i];
                if(!is_numeric($priceMax)){
                    //Ignorar star ratings
                    $starRngs = null;
                    $starRatingsString = "()";
                    break;
                }
                $priceMin = $priceMax - 1;
                $starRatingsString .= "((score >= " . $priceMin . ") AND (score <= " . $priceMax . "))";
                if(($i < count($starRatings) - 1)){
                    $starRatingsString .= "OR";
                }
            }
            /*
            for($i = 0; $i < count($starRatings) - 1; $i+=2){
                $starRatingsString .= "((score >= " . $starRatings[$i] . ") AND (score <= " . $starRatings[$i+1] . "))";
                if(($i < count($starRatings) - 1 - 2)){
                    $starRatingsString .= "OR";
                }
            }
            */
            $starRatingsString .= ")";

        }



        
        if($cate != null && $cate != "-1"){
            $cat = preg_split('/[ ]/', $cate);
            $catString = "(";
            $catString .= "category_id = " . $cat[0];
            
            for($i = 1; $i < count($cat); $i++){
                
                $catI = $cat[$i];
                if(!is_numeric($catI)){
                    $catString = "()";
                    $cat = null;
                    $cate = -1;
                    break;
                }
                $catString .= " OR category_id = " . $cat[$i];
            }
            
            $catString .= ")";
        }
        else{
            $cat = -1;
        }

        $filteredByCat;
        if($starRngs != null){
            if($priceRngs != null){
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);//("category_id",$cat);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))->whereRaw($priceQuerryString)
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false)->whereRaw($priceQuerryString)->whereRaw($starRatingsString);
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($priceQuerryString)->whereRaw($starRatingsString)
                    ;
                }
                else{
                    $searchResults = Item::where("is_archived",false)->whereRaw($priceQuerryString)->whereRaw($starRatingsString);
                }
            }
            else{
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false)->whereRaw($starRatingsString);
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($starRatingsString)
                    ;
                }
                else{
                    $searchResults = Item::where("is_archived",false)->whereRaw($starRatingsString)->whereRaw($starRatingsString);
                }
            }
        }
        else{
            if($priceRngs != null){
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false)->whereRaw($priceQuerryString);
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($priceQuerryString)
                    ;
                }
                else{
                    $searchResults = Item::where("is_archived",false)->whereRaw($priceQuerryString);
                }
        
            }
            else{
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false);
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)
                    ;
                }
                else{
                    $searchResults = Item::where("is_archived",false);
                }
            }
        }
        

        

        $categories = Category::all()->sortBy("category_id");

        if($step == null){
            $step = 1;
        }
        if($step <= 0){
            $step = 1;
        }


        $searchResults = $searchResults->orderBy("name", "asc")->get();
        //    return $items;
        return view("pages.searchResults")->with("searchResults",$searchResults)->with("categories",$categories)->with("step", $step);
    }

    public function showAjax(Request $request)
    {


        $data = $request->all();

        if(!isset($data['filterBy'])){
            $filterBy = 'name';
        }
        else{
            $filterBy = $data['filterBy'];
        }
        if(!isset($data['order'])){
            $order = 'ASC';
        }
        else{
            $order = $data['order'];
        }


        if(isset($data['step'])){
            $step = $data['step'];
        }
        else{
            $step = 1;
        }
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
                    $searchResults = $searchResults->where("is_archived",false)->whereRaw($priceQuerryString)->whereRaw($starRatingsString);
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($priceQuerryString)->whereRaw($starRatingsString)
                    ;
                }
                else{
                    $searchResults = Item::where("is_archived",false)->whereRaw($priceQuerryString)->whereRaw($starRatingsString);
                }
            }
            else{
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false)->whereRaw($starRatingsString);
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($starRatingsString);
                }
                else{
                    $searchResults = Item::where("is_archived",false)->whereRaw($starRatingsString)->whereRaw($starRatingsString);
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
                    $searchResults = $searchResults->where("is_archived",false)->whereRaw($priceQuerryString);
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false)->whereRaw($priceQuerryString);
                }
                else{
                    $searchResults = Item::where("is_archived",false)->whereRaw($priceQuerryString);
                }
        
            }
            else{
                if($cat!=null && $cat!=-1){
                    $searchResults =  Item::whereRaw($catString);
                    if($q!=null)
                        $searchResults =  $searchResults->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                        ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
                    $searchResults = $searchResults->where("is_archived",false);
                }
                else if($q != null){
                    $searchResults =  Item::whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)))->where("is_archived",false);
                }
                else{
                    $searchResults = Item::where("is_archived",false);
                }
            }
        }
        

        if(isset($data["filterNum"])){
            $filterNum = $data["filterNum"];
        }
        else{
            $filterNum = 1;
        }


        $categories = Category::all()->sortBy("category_id");

        $searchResults = $searchResults->orderBy($filterBy, $order)->get();

        //    return $items;
        return view("partials.searchResultList")->with("searchResults", $searchResults)->with("categories",$categories)->with("step", $step)->with("filterNum", $filterNum);
    }

}
