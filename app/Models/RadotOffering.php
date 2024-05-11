<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadotOffering extends Model
{
    use HasFactory;
    protected $table='offerings_radot';
    protected $guarded = ['id'];

    public function distributor(){
        return $this->hasOne(RadotDistributor::class,'id','distributor_id');
    }

    public function farmer(){
        return $this->hasOne(User::class,'id','farmer_id');
    }

}
