<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Details extends Model
{
    use HasFactory;
    public $timestamps  = false;

    protected $table = 'details';
    protected $primaryKey = 'detail_id';

    public function getDetailInfo(){
        return DB::select("SELECT detail_info FROM item_detail JOIN details USING (detail_id) WHERE detail_id = ? ",array($this->detail_id));
    }
}
