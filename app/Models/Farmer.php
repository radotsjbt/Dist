<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    public $table = 'farmers';
    
    protected $fillable = [
        'Farmer_Name',
        'Farmer_Address',
        'Farmer_Phone',
        'Farmer_Email',
        
        
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
