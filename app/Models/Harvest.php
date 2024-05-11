<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Harvest extends Model
{
    use HasFactory;

    public $table ='harvests';

    public function farmer(){
        return $this->hasOne(User::class,'id','Farmer_Id');
    }

    // relation between products and user
    public function user(){
        return $this->belongsTo(User::class);
    }
    // relation between products and offering
    public function offering(){
        return $this->hasMany(Offering::class);
    }
    // relation between products and customer
    public function distributor(){
        return $this->hasMany(Distributor::class);
    }

    protected $fillable = [
        'Harv_Name',
        'Harv_Desc',
        'Harv_Type',
        'Harv_Stock',
        'Harv_Price',
        'Image_Harv',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
        'remember_token'
    ];
}
