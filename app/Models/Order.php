<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';

    protected $fillable = [
        'Harv_Name',
        'Dist_Name',
        'Farmer_Name',
        'Qty',
        'Total_Price',
        'Notes'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
        'remember_token'
    ];

    // relation between order and user (1 to 1)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relation between order and farmer (1 to 1)
    public function farmer(){
        return $this->belongsTo(Farmer::class);
    }

    //relation between order and products (1 to 1)
    public function harvest(){
        return $this->belongsTo(Harvest::class);
    }

    public function product(){
        return $this->hasOne(Harvest::class,'id','Harv_Id');
    }
}
