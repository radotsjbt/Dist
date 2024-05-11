@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2"> Notifications</h1>
</div>

<div class="table-responsive">

  <h1>halo </h1>
    {{-- <table class="table table-striped table-sm">
      <thead>
        <tr>
        <th scope="col">Offer_ID</th>
          <th scope="col">Customer</th>
          <th scope="col">Product</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total Price</th>
          <th scope="col">Notes</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($offer as $off)
         @if(auth()->user()->username === $off->Farmer_Name)
             <tr>
          <td>{{ $off->Offer_ID}}</td>
          <td>{{ $off->Cust_Name}}</td>
          <td>{{ $off->Harv_Name}}</td>
          <td>{{ $off->Qty}}</td>
          <td>{{ $off->Total_Price}}</td>
          <td>{{ $off->Notes}}</td>
          
        </tr>
        @endif
        @endforeach
       
        
      </tbody>
    </table> --}}
  </div>

@endsection
