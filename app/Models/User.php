<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','username', 'email', 'password','first_name','last_name',
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];


    public function wishlist() {
        return $this->belongsToMany(Item::class,"wishlist", "user_id", "item_id")->get();
    }

    public function wishlistItem($item_id) {
        return $this->belongsToMany(Item::class,"wishlist", "user_id", "item_id")->where('wishlist.item_id', $item_id)->get();
    }

    public function cart() {
        return $this->belongsToMany(Item::class,"cart", "user_id", "item_id")->withPivot('quantity')->get();
    }

    public function cartItem($item_id) {
        return $this->belongsToMany(Item::class,"cart", "user_id", "item_id")->withPivot('quantity')->where('item_id', $item_id)->get();
    }

    public function cartTotal() {
        return $this->belongsToMany(Item::class,"cart", "user_id", "item_id")->withPivot('quantity')->sum(\DB::raw('quantity * price'));
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, "user_id")->orderBy("date", "DESC");
    }

    public function notifications() {
        return $this->belongsToMany(Item::class,"notification", "user_id", "item_id")->withPivot("type")->where('is_seen',false)->get();
    }

    public function billingAddress() {
        return Address::find($this["billing_address"]);
    }

    public function shippingAddress() {
        return Address::find($this["shipping_address"]);
    }

    /**
     * The cards this user owns.
     */
     public function cards() {
      return $this->hasMany('App\Models\Review');
    }
}
