<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    function show(){
        return view('auth.change-password');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255'
        ]);
    }

    function changePassword(Request $request)
    {
        if(Hash::check($request->input("current_password"), Auth::user()->password)){
            $validation =  Validator::make($request->all(), [
                'password' => 'required|string|min:6|confirmed',
            ]);

            if($validation->fails())
            {
                return back()->with(['error'=>'New Passwords Do Not Match!']);;
            }
    
            User::find(Auth::user()["user_id"])->update(['password'=> Hash::make($request->new_password)]);
    
            return redirect('/userProfile/' . Auth::user()["user_id"]);
        }
        return back()->with(['error'=>'Old Password Does Not Match!']);;
    }
}
