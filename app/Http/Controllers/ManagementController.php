<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ManagementController extends Controller
{
    public function unbanUser($id)
    {
        $user = User::find($id);
        if(is_null($user))
        {
            abort(404);
        }

        DB::table('ban')
            ->where('user_id',$id)
            ->delete();
        
        return view("partials.promoteOrBanUserModal",array("user" => $user));
    }

    public function banUser(Request $request, $id)
    {
        $user = User::find($id);
        if(is_null($user))
        {
            abort(404);
        }
        
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
        $user = User::find($id);
        if(is_null($user))
        {
            abort(404);
        }

        $user["is_admin"] = true;

        $user->save();
    }

    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.management')->with("categories", $categories);
    }
}
