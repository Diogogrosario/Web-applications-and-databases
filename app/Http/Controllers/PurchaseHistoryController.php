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
        
        return view('pages.purchaseHistory')->with("user", $user)->with("categories", $categories)->with("id",$id);
    }

    public function showSelf()
    {
        $user = Auth::user();

        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.purchaseHistory')->with("user", $user)->with("categories", $categories)->with("id",Auth::user()["user_id"]);
    }

    public function reorder(Request $request)
    {
        $filterBy = $request->input('filterBy');
        $order = $request->input('order');
        $id = $request->input('id');

        $user = User::findOrFail($id);

        $purchases = $user->purchases()->orderBy($filterBy, $order)->get();

        return view("partials.purchaseHistoryEntry")->with("purchases", $purchases);
    }
}
