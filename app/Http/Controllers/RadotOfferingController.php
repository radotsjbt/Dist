<?php

namespace App\Http\Controllers;

use App\Events\NotifiCation;
use App\Models\Distributor;
use App\Models\Offering;
use App\Models\Product;
use App\Models\RadotDistributor;
use App\Models\RadotOffering;
use App\Models\RadotProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RadotOfferingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distributors = Distributor::all();
        $products = RadotProduct::where('farmer_name','=',Auth::user()->name)->get();
        return view('radot_offering.index',compact('distributors','products'));
    }

    public function getHistory(){
        $radot_offering = RadotOffering::where('farmer_id','=',Auth::user()->id)->get();
        return view('radot_offering.history',compact('radot_offering'));
    }

    public function getHistoryDistributor(){
        $user = User::where('id','=',Auth::user()->id)->first();
        $distributor = RadotDistributor::where('cust_name','=',$user->name)->first();
        $offerings = RadotOffering::where('distributor_id','=',$distributor->id)->get();
        return view('radot_offering.history',compact('offerings'));
    }

    public function acceptOffering($id){
        $radot_offering = RadotOffering::findOrFail($id);
        $user = User::where('id','=',$radot_offering->farmer_id)->first();
        $radot_offering->status = 'accepted';
        $radot_offering->save();
        $this->notification($user->id,"accept radot_offering From ",Auth::user()->name);
        return redirect()->back()->with('success','Offering Accepted');
    }

    public function declineOffering($id){
        $radot_offering = RadotOffering::findOrFail($id);
        $user = User::where('id','=',$radot_offering->farmer_id)->first();
        $radot_offering->status = 'decline';
        $radot_offering->save();
        $this->notification($user->id,"decline radot_offering From ",Auth::user()->name);
        return redirect()->back()->with('success','Offering Accepted');
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'qty' => 'required',
            'product_name' => 'required',
            'total_price' => 'required',
            'notes' => 'required',
        ]);

        $radot_offering = RadotOffering::create([
            'distributor_id' => $request->distributor_id,
            'farmer_id' => Auth::user()->id,
            'product_name' => $request->product_name,
            'qty' => $request->qty,
            'total_price' => $request->total_price,
            'notes' => $request->notes
        ]);

        $distributor = RadotDistributor::where('id','=',$radot_offering->distributor_id)->first();
        $user = User::where('name','=',$distributor->cust_name)->first();
        $farmer_id = User::where('id','=',Auth::user()->id)->first();
        $this->notification($user->id,"Offering from ",$farmer_id->name);
        return response()->json(['data' => $radot_offering],200);
    }

    public function notification($userId,$message,$userName){
        event(new NotifiCation($userId,$message.$userName));
    }

    /**
     * Display the specified resource.
     */
    public function show(RadotOffering $radot_offering)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RadotOffering $radot_offering)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RadotOffering $radot_offering)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RadotOffering $radot_offering)
    {
        //
    }
}
