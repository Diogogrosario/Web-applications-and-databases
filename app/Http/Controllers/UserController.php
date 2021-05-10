<?php

namespace App\Http\Controllers;

use App\Models\Country;
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

        $userShipAddress = Auth::user()->shippingAddress();

        $username = $request->input("username");
        $street = $request->input("newStreet");
        $country = $request->input("newCountry");
        $city = $request->input("newCity");

        if($username != null)
        {
            $user["username"] = $username;
        }
        if($street != null)
        {
            $userShipAddress["street"] = $street;
        }
        if($country != null)
        {
            $userShipAddress["country_id"] = $country;
        }
        if($city != null)
        {
            $userShipAddress["city"] = $city;
        }
        
        $userShipAddress->save();
        $user->save();


        return back();
    }

    public function editUsername(Request $request)
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

    public function editShipAddr(Request $request)
    {
        $user = Auth::user();
        $this->authorize('edit', $user);

        $userShipAddress = Auth::user()->shippingAddress();

        $street = $request->input("newStreet");
        $country = $request->input("newCountry");
        $city = $request->input("newCity");

        if($street != null && $street != "")
        {
            $userShipAddress["street"] = $street;
        }
        if($country != null && $country != "")
        {
            $userShipAddress["country_id"] = $country;
        }
        if($city != null && $city != "")
        {
            $userShipAddress["city"] = $city;
        }
        
        $userShipAddress->save();
        $user->save();

        return view("partials.userShippingInfo")->with("user", $user);
    }

    public function getShippingForm()
    {
        return view("partials.userShippingEditForm")->with("user",Auth::user())->with("countries", Country::all());
    }

    public function getShippingInfo()
    {
        return view("partials.userShippingInfo")->with("user",Auth::user());
    }
}
