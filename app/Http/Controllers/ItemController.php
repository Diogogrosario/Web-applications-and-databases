<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Card;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Creates a new item.
     *
     * @param  int  $card_id
     * @param  Request request containing the description
     * @return Response
     */
    public function create(Request $request, $card_id)
    {
        $item = new Item();
        $item->card_id = $card_id;
        $this->authorize('create', $item);
        $item->done = false;
        $item->description = $request->input('description');
        $item->save();
        return $item;
    }

    /**
     * Updates the state of an individual item.
     *
     * @param  int  $id
     * @param  Request request containing the new state
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        
        $this->authorize('update', $item);
        $item->done = $request->input('done');
        $item->save();
        return $item;
    }

    /**
     * Deletes an individual item.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        
        $this->authorize('delete', $item);
        $item->delete();
        return $item;
    }

    public function getItems(Request $request)
    {
        $q = request()->query('query');
        $c = request()->query('category');
        $p = request()->query('priceRange');
        $r = request()->query('review');

        $items = DB::table("item");

        if($q != null)
            $items = $items->whereRaw('item.search @@ plainto_tsquery(?)', array(strtolower($q)))
                    ->orderByRaw('ts_rank(item.search, plainto_tsquery(?)) DESC', array(strtolower($q)));
        if($c != null)
        {
            $category = Category::where("name",$c);
            if($category->first())
            {
                $items = $items->where("category_id",$category->get()[0]["category_id"]);
            }
            else{
                return collect([]);
            }
        }
        if($p != null)
        {
            $items = $items->where("price","<=",$p);
        }
        if($r != null)
        {
            $items = $items->where("score",">=",$r);
        }

        return $items->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $item = Item::findOrFail($id);


        return $item;
    }

    public function putAvailable($id){
        $item = Item::findOrFail($id);


        $this->authorize('update', $item);
        $item["is_archived"] = false;

        $item->save();

        return view("partials.deleteItemModal")->with("item",$item);
    }
 
    public function deleteItem($id){
        $item = Item::findOrFail($id);

        $this->authorize('update', $item);
        $item["is_archived"] = true;
        
        $item->save();

        return view("partials.addItemModal")->with("item",$item);
    }

    public function updateItem(Request $request,$id){


        $stock = $request->input("stock");
        $price = $request->input("price");
        
        
        $item = Item::find($id);
        $item["stock"] = $stock;
        $item["price"] = $price;

        $item->save();

        return back();
    }

    public function editDetail(Request $request,$id,$id2){

        $new_detail_value = $request->input("detail_value");

        DB::table('item_detail')->where('item_id',$id)->where('detail_id',$id2)->update(['detail_info' => $new_detail_value]);

        return ;
    }
    
    public function addDiscount(Request $request) {
        $post = $request->post();

        $id = $post['item_id'];
        $begin_date = $post['begin_date'];
        $end_date = $post['end_date'];
        $percentage = $post['percentage'];

        $item = Item::findOrFail($id);
        $this->authorize('update', $item);

        $begin = strtotime($begin_date);
        $end = strtotime($end_date);

        if($percentage < 1 || $percentage > 99) {
            return response()->json('Discount percentage must be between 1% and 99%.', 406);
        } else if($begin > $end) {
            return response()->json('End date must be after begin date.', 406);
        }
        
        $discount = new Discount();
        $discount->begin_date = $begin_date;
        $discount->end_date = $end_date;
        $discount->percentage = $percentage;
        $discount->save();

        DB::table('apply_discount')->insert(["discount_id" => $discount->discount_id, "item_id" => $id]);

        // $item->discounts()->sync([$discount->discount_id],false);
        return response()->json(["discount_id" => $discount->discount_id, 'begin_date' => date("Y-m-d", $begin), 
                                'end_date' => date("Y-m-d", $end), 'percentage' => $percentage], 200);
    }

    public function getPriceDiscount($id) {
        $item = Item::findOrFail($id);

        $discount = $item->getDiscount();

        if($discount > 0) {
            $priceDiscounted = $item->priceGivenDiscount($discount);
        } else {
            $priceDiscounted = $item['price'];
        }

        return response()->json(["item_id" => $id, "discount" => $discount, "price" => $item['price'],
                                 "price_discounted" => $priceDiscounted], 200);
    }
}
