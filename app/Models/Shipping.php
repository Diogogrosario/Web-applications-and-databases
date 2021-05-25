<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    public $timestamps  = false;
    protected $table = 'shipping_option';
    protected $primaryKey = 'shipping_id';

    protected $fillable = [
        'name','description', 'price', 'img'
    ];

    public function image() {
        return $this->hasOne(Photo::class,"photo_id","img");
    }
}
