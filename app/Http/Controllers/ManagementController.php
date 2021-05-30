<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ManagementController extends Controller
{
    public function unbanUser($id)
    {
        $user = User::findOrFail($id);


        DB::table('ban')
            ->where('user_id',$id)
            ->delete();
        
        return view("partials.promoteOrBanUserModal",array("user" => $user));
    }

    public function banUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        
        DB::table("ban")->insert(
            array('user_id' => $id,
            'admin_id' => Auth::user()["user_id"],
            'reason' => $request->input("reason")
            )
        );

        return view("partials.unbanUserModal",array("user" => $user));
    }

    public function promoteUser($id)
    {
        $user = User::findOrFail($id);


        $user["is_admin"] = true;

        $user->save();
    }

    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.management')->with("categories", $categories);
    }

    public function showPurchases()
    {
        $categories = Category::all()->sortBy("category_id");
        $purchases = Purchase::all();

        return view('pages.managePurchases')->with("categories", $categories)->with("purchases", $purchases);
    }

    public function changePurchaseStatus(Request $request) {
        $purchase_id = $request->route("id");
        $new_status = $request->post()['status'];
        $purchase = Purchase::findOrFail($purchase_id);

        if($new_status != "Processing" && $new_status != "Sent" && $new_status != "Arrived") {
            return response()->json("Invalid purchase status", 406);
        }

        $purchase->state = $new_status;
        $purchase->save();
        
        return response()->json(['status' => $purchase->state], 200);
    }
}
