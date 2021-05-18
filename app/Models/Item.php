<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'item';
  protected $primaryKey = 'item_id';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name','price', 'stock', 'brief_description','description','category_id','score',
  ];

  
  public function photos() {
    return $this->belongsToMany(Photo::class,"item_photo", "item_id", "photo_id");
  }

  public function category() {
    return $this->belongsTo(Category::class,"category_id")->get()[0];
  }

  public function details() {
    return $this->belongsToMany(Details::class,"item_detail", "item_id", "detail_id")->withPivot('detail_info');
  }

  public function reviews() {
    return $this->hasMany(Review::class,"item_id")->orderBy("date", "desc");
  }

  public function getRandomItemsSameCategory($amount)
  {
    return Item::where("category_id",$this["category_id"])->where("item_id",'!=',$this["item_id"])->inRandomOrder()->limit($amount)->get();
  }

  public function getPriceInt(){
    return explode('$',$this->price)[1];
  }

}
