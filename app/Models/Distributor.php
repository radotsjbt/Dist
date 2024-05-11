<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    public $table = 'distributors';

    protected $fillable = [
        'Dist_Name',
        'Dist_Address',
        'Dist_Phone',
        'Dist_Image',
        'Purchase_Needs',
        'DistProd_Name',
        'DistProd_Desc'
        
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
