<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function get($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public function getPurchaseHistory($id)
    {
        $user = User::findOrFail($id);

        return $user->purchases()->get();
    }

    public function deleteAccount($id)
    {
        $user = User::findOrFail($id);


        $this->authorize('delete', $user);

        Auth::logout();
        $user->delete();
    }

    public function edit(Request $request)
    {
        $user = Auth::user();

        $this->authorize('edit', $user);

        $username = $request->input("username");

        if($username != null)
        {
            $user["username"] = $username;
        }

        $user->save();

        return $username;
    }
}
