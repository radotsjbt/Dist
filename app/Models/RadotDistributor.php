<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadotDistributor extends Model
{
    use HasFactory;
    protected $table='distributors_radot';
    protected $guarded = ['id'];
}
