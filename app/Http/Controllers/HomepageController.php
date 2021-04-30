<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $generateRandomCatefories = true;
        if(Auth::check())
        {
            $categoriesUser = DB::select("select category.category_id, count(*) as occurrences
                                                from category join
                                                (
                                                    --gets users bought items
                                                    item join
                                                    (
                                                        -- gets user's bought items ids
                                                        purchase_item join
                                                        (users join purchase using (user_id)) as user_purchases using (purchase_id)
                                                    ) as bought_items_ids using(item_id)
                                                ) as bought_items using (category_id)
                                                where bought_items.user_id = ?
                                                group by (category.category_id)
                                                order by occurrences desc
                                                limit 3;",array(Auth::id()));

            if(count($categoriesUser) >= 3)
            {
                $generateRandomCatefories = false;
                $items1 = Item::where("category_id",$categoriesUser[0]->category_id)->orderBy("item_id")->get(); 
                $items2 = Item::where("category_id",$categoriesUser[1]->category_id)->orderBy("item_id")->get(); 
                $items3 = Item::where("category_id",$categoriesUser[2]->category_id)->orderBy("item_id")->get(); 
                $itemsArray = array($items1,$items2,$items3);

            }

        }

        if($generateRandomCatefories){
            $categoriesRand = Category::inRandomOrder()->limit(3)->get();

            $items1 = Item::where("category_id",$categoriesRand[0]["category_id"])->orderBy("item_id")->get();
            $items2 = Item::where("category_id",$categoriesRand[1]["category_id"])->orderBy("item_id")->get();
            $items3 = Item::where("category_id",$categoriesRand[2]["category_id"])->orderBy("item_id")->get();
            $itemsArray = array($items1,$items2,$items3);
        }
        $categories = Category::all()->sortBy("category_id");

        return view('pages.homepage')->with('itemsArray', $itemsArray)->with('categories', $categories);
    }
}
