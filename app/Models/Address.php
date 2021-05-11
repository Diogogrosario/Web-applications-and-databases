<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    public $timestamps  = false;

    protected $table = 'address';
    protected $primaryKey = 'address_id';

    protected $fillable = [
        'country_id','street', 'city','zip_code',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id')->get()[0];
    }
}
