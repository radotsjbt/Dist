<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadotProduct extends Model
{
    use HasFactory;

protected $table='products_radot';
    protected $guarded = ['id'];


    public function Product(){
        return $this->hasOne(RadotProduct::class,'farmer_id','farmer_id');
    }

}
