<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Models\Farmer;
use App\Models\User;
use App\Http\Requests\UpdateHarvestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;



class HarvestController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function addProduct(Request $request)
    {
        // create new product
        $harv = new Harvest();

        // Generate the ID
        $harv->Harv_ID = IdGenerator::generate([
            'table' => 'harvests',
            'field' => 'Harv_ID',
            'length' => 7,
            'prefix' => 'HRV'
        ]);
        $harv->Harv_Name = request('inputHarvName');
        $harv->Farmer_Id = auth()->user()->id;
        $harv->Farmer_Name = auth()->user()->username;
        $harv->Harv_Desc = request('inputHarvDesc');
        $harv->Harv_Type = request('inputHarvType');
        $harv->Harv_Stock = request('inputHarvStock');
        $harv->Harv_Price = request('inputHarvPrice');

        // upload the image
        $filename = '';
        if ($request->file('inputGroupImage')) {
            $image = $request->file('inputGroupImage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/assets/images/'), $filename);
            $filename = $request->getSchemeAndHttpHost() . '/assets/images/' . $filename;

            $harv->Image_Harv = $filename;
        }

        $harv->save();
        return view('/dashboard/products/index', [
            "title" => "Products",
            "products" => Harvest::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('/dashboard/products/index', [
            "title" => "Products",
            "products" => Harvest::all()
        ]);
    }

    public function showSingle($id)
    {
        $prod = Harvest::find($id);
        $farm = $prod->Farmer_Id;

            return view('/dashboard/products/prod', [
                "title" => 'Detail Product',
                "products" => Harvest::find($id),
                "farmer" => Farmer::find($farm)
            ]);

    }

    public function showForm()
    {
        return view('dashboard/products/addProduct', [
            "title" => "Add Product",
        ]);
    }

    public function deleteProduct($id)
    {
        // Alert::warning('Warning Title', 'Do you want to delete this product?');    
        DB::table('harvests')->where('id', '=', $id)->delete();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProduct($id)
    {
        return view('dashboard/products/editProd', [
            'title' => 'Edit Product',
            'products' => Harvest::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProduct(Request $request, $id)
    {
        //get post by ID
        $harv = Harvest::find($id);

        $Harv_Name = $request->input('inputHarvName'); 
        $Harv_Desc = $request->input('inputHarvDesc'); 
        $Harv_Price = $request->input('inputHarvPrice'); 
        $Harv_Type = $request->input('inputHarvType'); 
        $Harv_Stock = $request->input('inputHarvStock'); 
        // Image_Harv = $request->input('inputGroupImage'); $

        //check if there is new image uploaded
        if ($request->file('inputGroupImage')) {

            $path = '/assets/images/' . $harv->Image_harv;
            if (File::exists($path)) {
                File::delete($path);
            }
            $image = $request->file('inputGroupImage');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/assets/images/'), $filename);
            $filename = $request->getSchemeAndHttpHost() . '/assets/images/' . $filename;

            
            $Image_Harv = $harv->Image_Harv = $filename;
        }

        // if there's no update image
        $Image_Harv = $harv->Image_Harv;

        // update the data on database
        DB::update('update harvests set Harv_Name = ?, Harv_Desc=? , Harv_Price=?, Harv_Type=?, Harv_Stock=?, Image_Harv=? where id=?', [$Harv_Name, $Harv_Desc, $Harv_Price, $Harv_Type, $Harv_Stock, $Image_Harv, $id]);

        return view('/dashboard/products/index', [
            'title' => 'Products',
            'products' => Harvest::all()
        ]);
    }

    public function currentStock(){

    }
}
