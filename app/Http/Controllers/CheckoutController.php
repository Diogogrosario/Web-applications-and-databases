<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CheckoutController extends Controller
{
    public function show(Request $request)
    {
        $this->authorize('checkout', Auth::user());

        $step = request()->query("step");
        if($step != null && $step != 1 && $step != 2 && $step != 3) {
            return redirect('/checkout');
        } else if($step == null) {
            $request->session()->pull('billing');
            $request->session()->pull('shipping');
        }

        if($step == 1) { // addresses
            $request->session()->pull('billing');
            $request->session()->pull('shipping');

            $categories = Category::all()->sortBy("category_id");
            $countries = Country::all();
            return view('pages.checkout')->with("categories", $categories)->with("step", $step)->with("countries", $countries);
        }
        else if($step == 2) { // shipping
            //TODO: if addresses arent set go back
            if(!$request->session()->has('billing') || !$request->session()->has('shipping'))
                return redirect()->route('checkout')->with('error', 'Billing and shipping addresses must be correctly set before choosing shipping.');

        } else if($step == 3) { // payment
            //TODO: if addresses and shipping arent set go back
            if(!$request->session()->has('billing') || !$request->session()->has('shipping'))
                return redirect()->route('checkout')->with('error', 'Billing and shipping addresses must be correctly set before payment.');
        }

        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.checkout')->with("categories", $categories)->with("step", $step);
    }

    public function getAddressForm($type)
    {
        if($type != "shipping" && $type != "billing") {
            return response()->json("Invalid address type", 400);
        }
        return view("partials.checkoutAddressForm")->with("addressType", $type)->with("countries", Country::all());
    }

    public function toAddresses() {

        $this->authorize('checkout', Auth::user());
        return redirect('/checkout?step=1');
    }

    public function toShipping(Request $request) {

        $this->authorize('checkout', Auth::user());

        $post = $request->post();
        $user = Auth::user();
        var_dump($post);

        $billing = [];
        $shipping = [];

        if($post['useDefinedBilling'] == "Yes") {
            if($user->billingAddress()->count() == 0) {
                return back()->with('error', 'User does not have any billing address defined')->withInput();

            } else {
                $billing = ['created' => 'no',
                            'address_id' => $user->billingAddress()['address_id']
                            ];
            } 
        } else {
            $street = $post['billingStreetFormCheckout'];
            $city = $post['billingCityFormCheckout'];
            $country_id = $post['billingCountryFormCheckout'];
            $zip_code = $post['billingZipcodeFormCheckout'];

            if($street == NULL || $city == NULL || $country_id == NULL || $zip_code == NULL) {
                return back()->with('error', 'Invalid billing address! Fields missing')->withInput();
            }

            $billing = ['created' => 'yes',
                        'street' => $street,
                        'city' => $city,
                        'country_id' => $country_id,
                        'zip_code' => $zip_code,
                        ];
        }

        if($post['shippingUse'] == "defined") {

            if($user->shippingAddress()->count() == 0) {
                return back()->with('error', 'User does not have any shipping address defined')->withInput();

            } else {
                $shipping = ['created' => 'no',
                            'address_id' => $user->shippingAddress()['address_id']
                            ];
            }
         
        } else if($post['shippingUse'] == 'equal') {
            $shipping = $billing;

        } else if($post['shippingUse'] == 'other') {
            $street = $post['shippingStreetFormCheckout'];
            $city = $post['shippingCityFormCheckout'];
            $country_id = $post['shippingCountryFormCheckout'];
            $zip_code = $post['shippingZipcodeFormCheckout'];

            if($street == NULL || $city == NULL || $country_id == NULL || $zip_code == NULL) {
                return back()->with('error', 'Invalid shipping address! Fields missing')->withInput($request->input());
            }

            $shipping = ['created' => 'yes',
                        'street' => $street,
                        'city' => $city,
                        'country_id' => $country_id,
                        'zip_code' => $zip_code,
                        ];
        }

        $request->session()->put('billing', $billing);
        $request->session()->put('shipping', $shipping);
        //TODO: check and add inputs to session
        return CheckoutController::toPayment();
    }

    public function toPayment() {
        $this->authorize('checkout', Auth::user());

        
        //TODO: check and add inputs to session
        return redirect('/checkout?step=3');
    }

    public function finishBalance() {
        $this->authorize('checkout', Auth::user());
        return redirect('/checkout');
    }

    public function finishPaypal() {
        return redirect('/');
    }
}
