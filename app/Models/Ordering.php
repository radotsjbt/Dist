<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordering extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(){
        return $this->hasOne(User::class,'id','distributor_id');
    }

    public function product(){
        return $this->hasOne(RadotProduct::class,'farmer_id','farmer_id');
    }
}
