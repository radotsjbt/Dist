<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Distributor;

class DistributorController extends Controller
{

    public function detailProduk($id){
        $product = Harvest::find($id);
        // dd($product);
        return view('radot_products.detail', [
            "title" => "Detail Produk",
            "product" => $product
        ]);
    }
    public function showDistributor(){
        return view('/dashboard/distributor/index', [
            "title" => "Distributor",
            "distributor" => Distributor::all()
        ]);
        
    }

    public function rekomendasi(){
        return view('/dashboard/distributor/rekomendasi', [
            "title" => "Rekomendasi",
            "distributor" => Distributor::all()
        ]);
        
    }

    public function showSingle($id)
    {
        return view('/dashboard/distributor/dist', [
            "title" => "Detail Distributor",
            "distributor" => Distributor::find($id)
           
        ]);
    }
    public function changeData($Dist_ID)
    {
        $dist = Distributor::select('*')
             ->where('Dist_ID', $Dist_ID)
             ->get();

    return view('/dashboard', ['dist' => $dist]);
    }

        public function updateData(Request $request)
        {
            $user = auth()->user()->User_ID;

            //update purchase needs, customer product name and desc
            $dist = DB::table('distributors')
             ->update([
                    'Purchase_Needs' => $request->Purchase_Needs,
                    'DistProd_Name' => $request->DistProd_Name,
                    'DistProd_Desc' => $request->DistProd_Desc,
             ]);
            //  $cust->save();
             
             return view('/dashboard/notification/notif', [
                'title'=>'Notification',
                'distributor' => $dist,
                'all'=> Distributor::find($user)
        ]);
        }

}
