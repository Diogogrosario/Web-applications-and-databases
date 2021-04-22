<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'item';
  protected $primaryKey = 'item_id';

  /**
   * The card this item belongs to.
   */
  public function photos() {
    return $this->belongsToMany(Photo::class,"item_photo", "item_id", "photo_id");
  }

  public function details() {
    return $this->belongsToMany(Details::class,"item_detail", "item_id", "detail_id")->withPivot('detail_info');
  }

  public function reviews() {
    return $this->hasMany(Review::class,"item_id");
  }
}
