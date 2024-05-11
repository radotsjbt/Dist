<?php

namespace App\Http\Controllers;

use App\Events\NotifiCation;
use App\Models\Ordering;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderingController extends Controller
{
    public function index()
    {
        $user = User::where('id','=',Auth::user()->id)->first();
        $farmer_id = Product::where('farmer_name','=',$user->name)->first();
        $products = Ordering::where('farmer_id','=',$farmer_id->farmer_id)->get();
        return view('ordering.history',compact('products'));
    }

    public function historyOrderingForDistributor(){
        $orderings = Ordering::where('distributor_id','=',Auth::user()->id)->get();
        return view('ordering.historydistributor',compact('orderings'));
    }

   
    public function create()
    {
        //
    }

    public function acceptOrdering($id){
        $ordering = Ordering::findOrFail($id);
        $product = Product::where('farmer_id','=',$ordering->farmer_id)->first();
        $user = User::where('id','=',$ordering->distributor_id)->first();
        if(intval($product->harv_stock) != 0 ){
            $product->harv_stock = intval($product->harv_stock) - intval($ordering->qty);
            $product->update();
        }
        $ordering->status = 'accepted';
        $ordering->save();
        $this->notification($user->id,"accept ordering From ",$product->farmer_name);
        return response()->json(['data' => $ordering],200);
    }

    public function declineOrdering($id){
        $ordering = Ordering::findOrFail($id);
        $user = User::where('id','=',$ordering->distributor_id)->first();
        $ordering->status = 'decline';
        $ordering->save();
        $this->notification($user->id,"Decline Ordering From ",Auth::user()->name);
        return response()->json(['data',$ordering]);
    }

    public function notification($userId,$message,$userName){
        event(new NotifiCation($userId,$message.$userName));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Ordering $ordering)
    {
        //
    }

    public function edit(Ordering $ordering)
    {
        //
    }

    public function update(Request $request, Ordering $ordering)
    {
        //
    }

    public function destroy(Ordering $ordering)
    {
        //
    }
}
