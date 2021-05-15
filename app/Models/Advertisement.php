<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    public $timestamps  = false;

    protected $table = 'advertisement';
    protected $primaryKey = 'advertisement_id';

    public function image() {
        return $this->hasOne(Photo::class,"photo_id","photo_id");
    }
}
