<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Harvest;
use App\Models\User;


use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){
        if (Auth::user()->role== 'Farmer'){
            return view('dashboard.index', [ 
                'title' => 'Dashboard',  
                   'customer' => User::all()
                ]);

        }else{
            // return view('dashboardDistributor');
            return view('dashboard.index_dist', [ 
                'title' => 'Dashboard',  
                   'customer' => User::all(),
                   'products' => Harvest::all()
                ]);
        }
        
    }

   
}
