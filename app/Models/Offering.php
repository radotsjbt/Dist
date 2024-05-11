<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    public $table = 'offering';

    protected $fillable = [
        'Dist_Name',
        'Harv_Name',
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


    // relation between offering and user (1 to 1)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relation between offering and customer (1 to 1)
    public function distributor(){
        return $this->belongsTo(Distributor::class);
    }

    //relation between offering and products (1 to 1)
    public function harvest(){
        return $this->belongsTo(Harvest::class);
    }

    
}
