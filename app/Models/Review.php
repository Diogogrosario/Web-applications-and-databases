<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $timestamps  = false;
    protected $table = 'review';
    protected $primaryKey = 'review_id';

    public function user()
    {
        return $this->hasOne(User::class,"user_id")->get();
    }


    public function getDate() {
        return date('Y-m-d', strtotime($this["date"]));
    }
}
