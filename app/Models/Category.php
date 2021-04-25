<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//TODO: add details

class Category extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'category';
    protected $primaryKey = 'category_id';


    /**
     * Items belonging to this category
     */
    public function item() {
        return $this->hasMany('App\Models\Item');
    }
}
