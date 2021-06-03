<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.cart')->with("user", $user)->with("categories", $categories);
    }

    public function showSelf()
    {
        $user = Auth::user();

        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.cart')->with("user", $user)->with("categories", $categories);
    }

    public static function anonCartQuantity() {
        $cart_entries = session('cart');

        if($cart_entries == NULL)
            return 0;

        $quantity_total = 0;

        foreach($cart_entries as $product_id => $quantity) {
            $quantity_total += $quantity;
        }
        return $quantity_total;
    }

    public static function anonCartEntries() {
        $cart_entries = [];
        $cart_session = session('cart');
        if($cart_session == NULL || $cart_session == [])
            return [];
        
        foreach($cart_session as $item_id => $quantity) {
            $item = Item::find($item_id);

            if($item != NULL)
                array_push($cart_entries, $item);
        }

        return $cart_entries;
    }

    public static function anonCartTotal($cart_items) {

        if($cart_items == NULL || count($cart_items) == 0)
            return '$0.00';

        $total = 0;

        foreach($cart_items as $item) {
            $item_price = floatval(preg_replace('/[^\d\.]/', '', $item->priceDiscounted()));
            $quantity = session('cart')[$item['item_id']];
            $total += $item_price * $quantity;
        }

        $total = number_format($total, 2, '.', ',');
        return '$' . $total;
    }

    public function addToCart(Request $request) {
        $data = $request->all();
        $id = $data["product_id"];
        $quantity = $data["quantity"];

        if(Auth::user() == null) {
            $item = Item::find($id);
            $cart_entries = session('cart');

            if($cart_entries != NULL) {
                if(array_key_exists($id, $cart_entries)) {
                    $new_quantity = $cart_entries[$id] + $quantity;

                    if($new_quantity > $item['stock'])
                        $new_quantity = $item['stock'];

                    $cart_entries[$id] = $new_quantity;
                    session()->put('cart', $cart_entries);
                } else {
                    if($quantity > $item['stock'])
                        $quantity = $item['stock'];

                    $new_entry = [$id => $quantity];
                    session()->put('cart', $cart_entries + $new_entry);
                }
            } else {
                if($quantity > $item['stock'])
                    $quantity = $item['stock'];
                session()->put('cart', [$id => $quantity]);
            }
            // return response()->json("Unauthenticated", 406);
            return response()->json(["message" => "Item added to cart successfuly.", "cart_total_quantity" => $this->anonCartQuantity()], 200);
        }

        return DB::transaction(function() use ($id, $quantity) {

            $item = Item::find($id);
            

            if($item["stock"] >= $quantity) {
                DB::select('call add_to_cart(?,?,?)', array(Auth::user()["user_id"], $id, $quantity));
                return response()->json(["message" => "Item added to cart successfuly.", "cart_total_quantity" => Auth::user()->cartTotalNumber()], 200);
            } else {
                return response()->json("Item does not have enough stock", 406);
            }
        });
    }

    public function removeFromCart($id) {
        $user = Auth::user();

        if($user == null) {

            $item = Item::find($id);
            $cart_entries = session('cart');

            if($cart_entries == NULL || $cart_entries == [] || !array_key_exists($id, $cart_entries)) {
                return response()->json("Product not in the user's cart", 406);
            } 

            unset($cart_entries[$id]);
            session()->put('cart', $cart_entries);

            return response()->json(["message" => "Item removed from cart successfuly.",
                "cart_total_quantity" => $this->anonCartQuantity(), 'total'=> $this->anonCartTotal($this->anonCartEntries())], 200);
        }
        
        return DB::transaction(function () use($user, $id) {
            $quantity = DB::table('cart')->where('user_id', $user["user_id"])->where('item_id', $id)->select('quantity')->get()[0]->quantity;

            DB::update('update item set stock = stock + ? where item_id = ?', [$quantity, $id]);
            $deleted = DB::table('cart')->where('user_id', $user["user_id"])->where('item_id', $id)->delete();

            if($deleted <= 0) {
                return response()->json("Product not in the user's cart", 406);
            } else {
                return response()->json(["message" => "Item removed from cart successfuly.",
                     "cart_total_quantity" => Auth::user()->cartTotalNumber(), 'total'=> $user->cartTotal()], 200);
            }
            
        }); 
    }

    public function updateQuantity(Request $request, $id) {
        
        $quantity = $request->all()["quantity"];

        $user = Auth::user();

        if($user == null) {
            $item = Item::find($id);
            $cart_entries = session('cart');

            if($cart_entries == NULL || $cart_entries == [] || !array_key_exists($id, $cart_entries)) {
                return response()->json("Product not in the user's cart", 406);
            } 

            $old_quantity = $cart_entries[$id];

            if($old_quantity == $item['stock'] && $quantity - $old_quantity > 0) {
                return response()->json("Item does not have enough stock", 406);
            }

            if($quantity > $item['stock'])
                $quantity = $item['stock'];

            $cart_entries[$id] = $quantity;

            session()->put('cart', $cart_entries);
            
            return response()->json(["message" => "Item quantity in cart updated successfuly.", 'new_quantity' => $quantity,
                "cart_total_quantity" => $this->anonCartQuantity(), 'total'=> $this->anonCartTotal($this->anonCartEntries())], 200);
        }
        

        return DB::transaction(function() use ($id, $quantity, $user) {

            $item = Item::find($id);
            $user_id = $user['user_id'];

            $old_quantity = DB::table('cart')->where('user_id', $user["user_id"])->where('item_id', $id)->select('quantity')->get()[0]->quantity;
            
            $quantity_diff = $quantity - $old_quantity;

            if($item["stock"] >= $quantity_diff) {
                DB::update('update item set stock = stock - ? where item_id = ?', [$quantity_diff, $id]);

                DB::update('update cart set quantity = ? where user_id = ? and item_id = ?', [$quantity, $user_id, $id]);
                return response()->json(['total'=> $user->cartTotal(), 'new_quantity' => $quantity,
                    "message" => "Item quantity in cart updated successfuly.", "cart_total_quantity" => Auth::user()->cartTotalNumber()], 200);
            } else {
                return response()->json("Item does not have enough stock", 406);
            }
        });
    }
}
