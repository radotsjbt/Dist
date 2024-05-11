<?php

namespace App\Http\Controllers;

use App\Events\NotifiCation;
use App\Imports\ProductImport;
use App\Imports\UserImportPetani;
use App\Models\Ordering;
use App\Models\Product;
use App\Models\RadotProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class RadotProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = RadotProduct::all();
        // dd($products);
        return view('radot_products.index',compact('products'));
    }

    public function order_page($id){
        $product = RadotProduct::findOrFail($id);
        return view('radot_products.order',compact('product'));
    }

    function generateRandomOrderId($prefix = "ORD-", $numberLength = 3) {
        $number = mt_rand(1, pow(10, $numberLength) - 1);
        $formattedNumber = str_pad($number, $numberLength, '0', STR_PAD_LEFT);
        return $prefix . $formattedNumber;
    }

    public function searchProduct(Request $request){
        $search = $request->input('search');
        $radot_products = RadotProduct::where('harv_name','like','%'.$search.'%')->get();
        return view('radot_products.index',compact('radot_products'));
    }
    
    public function ordering(Request $request){

        $order = Ordering::create([
            'order_id' => $this->generateRandomOrderId(),
            'distributor_id' => Auth::user()->id,
            'farmer_id' => $request->farmer_id,
            'qty' => $request->qty,
            'price' => $request->price,
            'total_price' => $request->total_price,
            'status' => 'ordering'
        ]);
        $farmer = RadotProduct::where('farmer_id','=',$order->farmer_id)->first();
        $user = User::where('name','=',$farmer->farmer_name)->first();
        $distributor_user = User::where('id','=',Auth::user()->id)->first();
        $this->notification($user->id,"Ordering From ",$distributor_user->name);
        return redirect()->back()->with('message','ordering sent');
    }

    public function recomendationFarmer(){
        $products = RadotProduct::all();
        return view('radot_products.recomendation',compact('products'));
    }

    public function notification($userId,$message,$userName){
        event(new NotifiCation($userId,$message.$userName));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('radot_products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv'
        ]);
        Excel::import(new ProductImport, request()->file('file'));
        Excel::import(new UserImportPetani, request()->file('file'));
        return redirect('radot_products/')->with('success', 'All good!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RadotProduct $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RadotProduct $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RadotProduct $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RadotProduct $product)
    {
        //
    }
}
