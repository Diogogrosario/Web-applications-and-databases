<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function show()
    {
        if(!Auth::check()) {
            return redirect('/login');
        }

        $step = request()->query("step");
        if($step != null && $step != 1 && $step != 2 && $step != 3) {
            return redirect()->route('checkout');
        }

        if($step == 2) { // shipping
            //TODO: if addresses arent set go back
        } else if($step == 3) { //payment
            //TODO: if addresses and shipping arent set go back
        }

        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.checkout')->with("categories", $categories)->with("step", $step);
    }

    public function getAddressForm($type)
    {
        if($type != "shipping" && $type != "billing") {
            return response()->json("Invalid address type", 400);
        }
        return view("partials.checkoutAddressForm")->with("addressType", $type);
    }

    public function toAddresses() {
        return redirect('/checkout?step=1');
    }

    public function toShipping() {
        //TODO: check and add inputs to session
        return redirect('/checkout?step=2');
    }

    public function toPayment() {
        //TODO: check and add inputs to session
        return redirect('/checkout?step=3');
    }

    public function finishBalance() {
        return redirect('/checkout');
    }

    public function finishPaypal() {
        return redirect('/');
    }
}
