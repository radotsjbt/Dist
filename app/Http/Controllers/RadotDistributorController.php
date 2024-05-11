<?php

namespace App\Http\Controllers;

use App\Imports\DistributorImport;
use App\Imports\UserImport;
use App\Models\Distributor;
use App\Models\RadotDistributor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RadotDistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $radot_distributors = RadotDistributor::all();
        return view('radot_distributors.index', compact('radot_distributors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('radot_distributors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv'
        ]);
        Excel::import(new DistributorImport, request()->file('file'));
        Excel::import(new UserImport, request()->file('file'));
        return redirect('radot_distributors/')->with('success', 'All good!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RadotDistributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RadotDistributor $distributor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RadotDistributor $distributor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RadotDistributor $distributor)
    {
        //
    }
}
