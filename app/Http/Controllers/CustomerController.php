<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    
    public function index(){
        return view('/dashboard/customer/index', [
            "title" => "Distributor",
            "customer" => Customer::all()
        ]);
        
    }

    public function showSingle($id)
    {
        return view('/dashboard/customer/cust', [
            "title" => "Detail Customer",
            "customer" => Customer::find($id)
           
        ]);
    }
    public function changeData($Cust_ID)
    {
        $cust = Customer::select('*')
             ->where('Cust_ID', $Cust_ID)
             ->get();

    return view('/dashboard', ['cust' => $cust]);
    }

        public function updateData(Request $request)
        {
           
            
           
            $user = auth()->user()->User_ID;

            //update purchase needs, customer product name and desc
            $cust = DB::table('customers')
             ->update([
                    'Purchase_Needs' => $request->Purchase_Needs,
                    'CustProd_Name' => $request->CustProd_Name,
                    'CustProd_Desc' => $request->CustProd_Desc,
             ]);
            //  $cust->save();
             
             return view('/dashboard/notification/notif', [
                'title'=>'Notification',
                'customer' => $cust,
                'all'=> Customer::find($user)
        ]);
        }

}
