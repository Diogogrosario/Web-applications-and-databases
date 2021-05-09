<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    public $timestamps  = false;
    protected $table = 'notification';
    protected $primaryKey = 'notification_id';

    public function item()
    {
        return $this->hasOne(Item::class,"item_id");
    }
}
