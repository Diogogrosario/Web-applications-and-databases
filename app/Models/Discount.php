<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    public $timestamps  = false;
    protected $table = 'discount';
    protected $primaryKey = 'discount_id';

    protected $fillable = [
        'begin_date','end_date', 'percentage'
    ];

    public function getBeginDate() {
        return date('Y-m-d', strtotime($this["begin_date"]));
    }

    public function getEndDate() {
        return date('Y-m-d', strtotime($this["end_date"]));
    }
}
