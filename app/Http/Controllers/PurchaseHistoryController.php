<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PurchaseHistoryController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.purchaseHistory')->with("user", $user)->with("categories", $categories);
    }

    public function showSelf()
    {
        $user = Auth::user();

        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.wishlist')->with("user", $user)->with("categories", $categories);
    }
}
