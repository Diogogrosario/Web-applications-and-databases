<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;

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

    public function getAddressInfo($type)
    {
        if($type != "shipping" && $type != "billing") {
            return response()->json("Invalid address type", 400);
        }
        return view("partials.checkoutAddressInfo")->with("addressType", $type);
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

    public function finishCheckout(Request $request) {
        $user = Auth::user();
        $this->authorize('checkout', Auth::user());

        if(!$request->session()->has('shipping') || !$request->session()->has('shipping')) {
            return redirect()->route('checkout')->with('error', 'Invalid checkout information. Could not proceed to payment.');
        }

        $post = $request->post();
        if($post['finish'] == "Balance") {
            // TODO: pay with balance
            return $this->payBalance($user, session('shipping'), session('billing'));
            
        } else if($post['finish'] == "Paypal") {
            // TODO: pay with paypal
            return $this->payPaypal($user);
        } else {
            return redirect()->route('checkout')->with('error', 'Invalid payment option.');
        }
    }

    private function processCheckout($user, $shipping, $billing) {
        DB::select('call discounts(?)', [$user["user_id"]]);
    }

    private function payBalance($user, $shipping, $billing) {
        $result = DB::transaction(function () use($user, $shipping, $billing) {
            $sum_prices = DB::select('SELECT sum((price - price * (get_discount(item_id, now()) / 100)) * quantity)
                        FROM item JOIN cart USING (item_id)
                        WHERE cart.user_id = ?;
            ', [$user['user_id']])[0]->sum;

            $sum_prices = floatval(preg_replace('/[^\d\.]/', '', $sum_prices)); // parse money
            // foreach(DB::table('cart')->where('user_id', $user["user_id"]) as $cart_item) {
            //     $item_discount = DB::select('select get_discount(?,?)', [$cart_item['item_id'], NULL]);
            //     $sum_prices = $sum_prices + $cart_item['price'] - ($cart_item['price'] * $item_discount);
            // }

            $currentBalance = floatval(preg_replace('/[^\d\.]/', '', $user['balance'])); // parse money

            if($currentBalance >= $sum_prices) {
                $this->processCheckout($user, $shipping, $billing);
                return 0;
            }
            return -1;
        });

        if($result == 0) {
            return redirect('/userProfile/'.$user['user_id'].'/purchaseHistory')->with('checkout_success', 'Checkout successful.');
        } else {
            return redirect('/checkout')->with('checkout_error', 'You do not have enough balance.');
        }
    }

    private function payPaypal($user) {
        $sum_prices = DB::transaction(function () use($user) {
            $sum_prices = DB::select('SELECT sum((price - price * (get_discount(item_id, now()) / 100)) * quantity)
                        FROM item JOIN cart USING (item_id)
                        WHERE cart.user_id = ?;
            ', [$user['user_id']])[0]->sum;

            $sum_prices = floatval(preg_replace('/[^\d\.]/', '', $sum_prices)); // parse money
            return $sum_prices;
        });

        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());

        $order = $provider->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                0 => [
                    "amount"=> [
                        "currency_code"=> "USD",
                        "value"=> $sum_prices
                    ]
                ]
                    ],
            "application_context" => [
                'shipping_preference'=> 'NO_SHIPPING',
                'brand_name' => 'Fneuc Shop',
                'return_url' => 'http://localhost:8000/checkout/capture'
                ]
          ]);

        session(['checkout_id' => $order['id']]);
        return redirect($order['links'][1]['href']);
    }

    public function finishPaypal(Request $request) {
        $user = Auth::user();
        $this->authorize('checkout', $user);

        $order_id = $request->query('token');

        if($order_id == null || session('checkout_id') == null || $order_id != session('checkout_id')) {
            abort(403, 'Expired order.');
        }

        if(!$request->session()->has('shipping') || !$request->session()->has('shipping')) {
            abort(403, 'Expired order.');
        }

        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());
        $capture = $provider->capturePaymentOrder(session('checkout_id'));

        if(array_key_exists("type",$capture)) {
            if($capture['type'] === 'error') {
                return redirect('/checkout')->with('checkout_error', 'It appears that there has been a problem with the payment. Please try again.');
            }
        } else if($capture['status'] === 'COMPLETED') {

            DB::transaction(function () use($user) {
                $this->processCheckout($user, session('shipping'), session('billing'));
            });
            return redirect('/userProfile/'.$user['user_id'].'/purchaseHistory')->with('checkout_success', 'Checkout successful.');
        } 

    }
}
