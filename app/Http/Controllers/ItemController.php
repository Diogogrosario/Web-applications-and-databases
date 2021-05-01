<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Card;
use App\Models\Category;
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
        $item = Item::find($id);
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
        $item = Item::find($id);
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
        $item = Item::find($id);

        if(is_null($item))
            abort(404);

        return $item;
    }
}
