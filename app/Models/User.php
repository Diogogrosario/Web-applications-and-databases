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
        'name', 'email', 'password','first_name','last_name',
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function wishlist() {
        return $this->belongsToMany(Item::class,"wishlist", "user_id", "item_id")->get();
    }

    public function cart() {
        return $this->belongsToMany(Item::class,"cart", "user_id", "item_id")->withPivot('quantity')->get();
    }

    public function cartTotal() {
        return $this->belongsToMany(Item::class,"cart", "user_id", "item_id")->withPivot('quantity')->sum(\DB::raw('quantity * price'));
    }

    /**
     * The cards this user owns.
     */
     public function cards() {
      return $this->hasMany('App\Models\Review');
    }
}
