<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class PurchaseHistoryController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user))
        {
            abort(404);
        }
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.purchaseHistory')->with("user", $user)->with("categories", $categories);
    }
}
