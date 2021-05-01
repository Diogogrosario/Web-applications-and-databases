<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function get($id)
    {
        $user = User::find($id);

        if(is_null($user))
            abort(404);
        
        return $user;
    }

    public function getPurchaseHistory($id)
    {
        $user = User::find($id);

        if(is_null($user))
            abort(404);
        
        return $user->purchases()->get();
    }
}
