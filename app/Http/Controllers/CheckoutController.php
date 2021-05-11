<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CheckoutController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.checkout')->with("categories", $categories);
    }

    public function getAddressForm($type)
    {
        if($type != "shipping" && $type != "billing") {
            return response()->json("Invalid address type", 400);
        }
        return view("partials.checkoutAddressForm")->with("addressType", $type);
    }
}
