<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddItemController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");

        return view('pages.addItem')->with("categories", $categories);
    }

    public function addItem(Request $request)
    {

        $name = $request->input("name");
        $price = $request->input("price");
        $stock = $request->input("stock");
        $category = $request->input("category");
        $shortDescription = $request->input("shortDescription");
        $description = $request->input("description");
        $details = $request->input("details");


        $details_parsed = json_decode($details);

        $images = $request->file("images");
        foreach ($images as $image) {
            $fileArray = array('image' => $image);
            $rules = array('image' => 'mimes:jpeg,jpg,png,gif|required|max:10000');
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                return response()->json("Invalid file", 400);
            }
        }

        $item = new Item();
        $this->authorize('create', $item);

        $item = Item::create([
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
            'brief_description' => $shortDescription,
            'description' => $description,
            'category_id' => $category,
            'score' => 0
        ]);

        $counter = 0;
        foreach ($images as $image) {
            $photo = new Photo();
            $this->authorize('create', $photo);
            $path = $item["item_id"]."_".$counter;
            $image->move('img/items', $path);

            $photo = Photo::create([
                'path' => $path
            ]);

            DB::insert('INSERT INTO item_photo(photo_id, item_id) VALUES (?,?)', array($photo['photo_id'], $item['item_id']));
            $item->photos()->sync(array($photo['photo_id']), false);
            $counter++;
        }




        $ids = array();

        foreach ($details_parsed as $detail_id => $detail_value) {
            if($detail_value != ""){
                DB::insert('INSERT INTO item_detail(item_id, detail_id, detail_info) VALUES (?,?,?)', array($item['item_id'], $detail_id, $detail_value));
                array_push($ids, $detail_id);
            }
        }
        $item->details()->sync($ids, false);


        return $item['item_id'];
    }
}
