<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserAdministrationController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        $users = User::where("deleted",false)->where("is_admin",false)->get();
        
        return view('pages.userAdministration')->with("categories", $categories)->with("users",$users);
    }
}
