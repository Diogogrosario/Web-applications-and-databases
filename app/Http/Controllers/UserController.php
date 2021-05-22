<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use NumberFormatter;
use App\Mail\ChangeEmail;
use Illuminate\Support\Facades\Mail;


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
        $zip = $request->input("newZip");
        $email = $request->input("email");

        if($username != null)
        {
            $user["username"] = $username;
        }
        if($userShipAddress == null){
            $userShipAddress = Address::create([
                'country_id' => $country,
                'street' => $street,
                'city' => $city,
                'zip_code' => $zip
            ]);
            $user["shipping_address"] = $userShipAddress["address_id"];
        }
        else{
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
            if($zip != null && $zip != "")
            {
                $userShipAddress["zip_code"] = $zip;
            }
        }
        if($email != null)
        {
            Mail::to(Auth::user()["email"])->send(new ChangeEmail($email));
            $user["email"] = $email;
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

    public function editAddress(Request $request)
    {
        $user = Auth::user();
        $this->authorize('edit', $user);

        $type = $request->route("type");
        if($type != "shipping" && $type != "billing") {
            return response()->json("Invalid address type", 406);
        }

        $street = $request->input("newStreet");
        $country = $request->input("newCountry");
        $city = $request->input("newCity");
        $zip = $request->input("newZip");

        if($type == "shipping") {
            $userAddress = Auth::user()->shippingAddress();
            $addressName = "shipping_address";
        } else {
            $userAddress = Auth::user()->billingAddress();
            $addressName = "billing_address";
        }

        if($userAddress == null){
            $userAddress = Address::create([
                'country_id' => $country,
                'street' => $street,
                'city' => $city,
                'zip_code' => $zip
            ]);
            $user[$addressName] = $userAddress["address_id"];
        }
        else{
            if($street != null && $street != "")
            {
                $userAddress["street"] = $street;
            }
            if($country != null && $country != "")
            {
                $userAddress["country_id"] = $country;
            }
            if($city != null && $city != "")
            {
                $userAddress["city"] = $city;
            }
            if($zip != null && $zip != "")
            {
                $userAddress["zip_code"] = $zip;
            }
        }
        
        $userAddress->save();
        $user->save();

        if($type == "shipping")
            $typeName = "Shipping";
        else 
            $typeName = "Billing";

        return view("partials.userAddressInfo")->with("user", $user)->with('addressType', $typeName);
    }

    public function getAddressForm(Request $request)
    {
        $type = $request->route("type");
        if($type != "shipping" && $type != "billing") {
            return response()->json("Invalid address type", 406);
        }
        if($type == "shipping")
            $typeName = "Shipping";
        else 
            $typeName = "Billing";

        return view("partials.userAddressEditForm")->with("user",Auth::user())->with("countries", Country::all())->with('addressType', $typeName);
    }

    public function getAddressInfo(Request $request)
    {
        $type = $request->route("type");
        if($type != "shipping" && $type != "billing") {
            return response()->json("Invalid address type", 406);
        }
        if($type == "shipping")
            $typeName = "Shipping";
        else 
            $typeName = "Billing";

        return view("partials.userAddressInfo")->with("user",Auth::user())->with("addressType", $typeName);
    }

    public function addBalance(Request $request)
    {

        $user = Auth::user();
        $this->authorize('checkout', $user);

        $amount = $request->post()['balance_amount'];
        if(!is_numeric($amount)) {
            return back()->with('error', 'Invalid amount to add balance.');
        }

        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());

        $order = $provider->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                0 => [
                    "amount"=> [
                        "currency_code"=> "USD",
                        "value"=> $amount
                    ]
                ]
                    ],
            "application_context" => [
                'shipping_preference'=> 'NO_SHIPPING',
                'brand_name' => 'Fneuc Shop',
                'return_url' => 'http://localhost:8000/userProfile/balance/capture'
                ]
          ]);

        session(['order_id' => $order['id']]);
        // var_dump($order['links'][1]['href']);
        // return $provider->showOrderDetails($order['id']);
        return redirect($order['links'][1]['href']); // approve order url
        
    }

    public function captureBalance(Request $request)
    {
        $user = Auth::user();
        $this->authorize('checkout', $user);
        $user_id = $user['user_id'];

        $order_id = $request->query('token');

        if($order_id == null || session('order_id') == null || $order_id != session('order_id')) {
            abort(403, 'Expired order.');
        }

        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());
        $capture = $provider->capturePaymentOrder(session('order_id'));
        
        if(array_key_exists("type",$capture)) {
            if($capture['type'] === 'error') {
                return redirect('/userProfile/' . strval($user['user_id']))->with('balance_error', 'It appears that there has been a problem with the payment. Please try again.');
            }
        } else if($capture['status'] === 'COMPLETED') {
            $value = $capture['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            DB::transaction(function () use ($user_id, $value) {
                $this->addBalanceValue($user_id, $value);
            });
            return redirect('/userProfile/' . strval($user['user_id']))->with('balance_success', 'Balance added successfully.');
        } 
    }

    public function addBalanceValue($id, $value) {
        $user = User::findOrFail($id);
        
        $currentBalance = floatval(preg_replace('/[^\d\.]/', '', $user['balance'])); // parse money
        $newBalance = $currentBalance + floatval($value);

        DB::table('users')
                ->where('user_id', $user['user_id'])
                ->update(['balance' => $newBalance]);
    }

    public function changeEmail(Request $request)
    {
        $email = $request->input("email");
        $user = Auth::user();

        $this->authorize('edit', $user);

        Mail::to(Auth::user()["email"])->send(new ChangeEmail($email));
        $user["email"] = $email;

        $user->save();
    }
}
