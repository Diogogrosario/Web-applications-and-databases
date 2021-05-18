<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddItemController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.addItem')->with("categories", $categories);
    }

    public function addItem(Request $request){
        $name = $request->input("name");
        $price = $request->input("price");
        $category = $request->input("category");
        $image = $request->input("image");
        $shortDescription = $request->input("shortDescription");
        $description = $request->input("description");
        $details = $request->input("details");
        
        $details_parsed = json_decode($details);

        $item = new Item();
        $this->authorize('create',$item);

        $item = Item::create([
            'name' => $name,
            'price' => $price,
            'stock' => 0,
            'brief_description' => $shortDescription,
            'description' => $description,
            'category_id' => $category,
            'score' => 0
        ]);


        $photo = new Photo();
        $this->authorize('create',$photo);

        $photo = Photo::create([
            'path' => $image
        ]);

        DB::insert('INSERT INTO item_photo(photo_id, item_id) VALUES (?,?)',array($photo['photo_id'],$item['item_id']));

        foreach ($details_parsed as $detail_id => $detail_value){
            DB::insert('INSERT INTO item_detail(item_id, detail_id, detail_info) VALUES (?,?,?)',array($item['item_id'],$detail_id,$detail_value));
        }

        var_dump(DB::select('SELECT * from item WHERE item_id = ?',array($item['item_id'])));
        var_dump(DB::select('SELECT * from item_photo WHERE item_id = ?',array($item['item_id'])));
        var_dump(DB::select('SELECT * from item_detail WHERE item_id = ?',array($item['item_id'])));
        var_dump(DB::select('SELECT * from photo WHERE photo_id = 61'));

        return $item['item_id'];
    }
}
