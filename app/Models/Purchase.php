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
        return $this->belongsToMany(Item::class,"purchase_item", "purchase_id", "item_id")->withPivot('quantity')->withPivot("price");
    }

    public function purchaseTotal() {
        return $this->hasMany(PurchaseItem::class,"purchase_id")->sum(\DB::raw('quantity * price'));
    }

    public function getDate() {
        return date('Y-m-d', strtotime($this["date"]));
    }

}
