<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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

    public function deleteAccount($id)
    {
        $user = User::find($id);
        if(is_null($user))
            abort(404);

        $this->authorize('delete', $user);

        Auth::logout();
        $user->delete();
    }
}
