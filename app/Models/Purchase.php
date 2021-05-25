<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    public $timestamps  = false;
    protected $table = 'purchase';
    protected $primaryKey = 'purchase_id';

    public function purchasedItems() {
        return $this->hasMany(PurchaseItem::class,"purchase_id");
    }

    public function purchaseTotalItems() {
        return $this->hasMany(PurchaseItem::class,"purchase_id")->sum(\DB::raw('quantity * price'));
    }

    public function purchaseTotal() {
        $shipping_price = $this->shippingOption()->price;
        $shipping_price = floatval(preg_replace('/[^\d\.]/', '', $shipping_price));
        $itemsPrice = floatval(preg_replace('/[^\d\.]/', '', $this->purchaseTotalItems()));

        return '$' . number_format($itemsPrice + $shipping_price, 2, '.', ',');
    }

    public function getDate() {
        return date('Y-m-d', strtotime($this["date"]));
    }

    public function billingAddress() {
        return Address::find($this["billing_address"]);
    }

    public function shippingAddress() {
        return Address::find($this["shipping_address"]);
    }

    public function shippingOption() {
        return $this->hasOne(Shipping::class, 'shipping_id', 'shipping_method')->get()[0];
    }
}
