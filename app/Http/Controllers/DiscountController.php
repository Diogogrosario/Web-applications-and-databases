<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    public function delete($item_id, $discount_id) {
        $discount = Discount::findOrFail($discount_id);
        $item = Item::findOrFail($item_id);

        $this->authorize("delete", $discount);
    
        DB::table('apply_discount')->where('item_id', $item_id)->where('discount_id', $discount_id)->delete();

        return response()->json('Discount deleted successfully', 200);
    }
}
