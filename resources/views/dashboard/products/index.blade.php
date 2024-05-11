
@extends('dashboard.layouts.main')
@section('container')

@can('FarmerCheck')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Your Product</h5>
   
    <!-- Bordered Table -->
    <table class="table table-bordered align-middle">
      <thead>
        <tr>
          <th scope="col">Harvest Id</th>
          <th scope="col">Harvest Result</th>
          <th scope="col">Price</th>
          <th scope="col">Stock</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $prod)
         @if(auth()->user()->username === $prod->Farmer_Name)
            <tr>
              <td>{{ $prod->Harv_ID}}</th>
              <td>{{ $prod->Harv_Name}}</td>
              <td>{{ $prod->Harv_Price}}</td>
              <td>{{ $prod->Harv_Stock}}</td>
              <td>
                <img src="{{ $prod->Image_Harv}}"
                style="height: 100px; width: 150px;">
              </td>
              <td>

                {{-- delete button --}}
                <a href="/dashboard/products/index/{{ $prod->id }}" class="btn-delete">
                  <i class="bi bi-trash3"></i> Delete
                </a>

                {{-- edit button --}}
                <a href="/dashboard/products/editProd/{{ $prod->id }}" class="btn-edit">
                  <i class="bi bi-pen"></i> Edit
                </a>
               
              </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <!-- End Bordered Table -->
  </div>
</div>
@endcan


@can('DistributorCheck')

{{-- search bar --}}
<div class="row height d-flex justify-content-center align-items-center">

  <div class="col-md-8">
    <div class="search">
      <i class="fa fa-search"></i>
      <input type="text" class="form-control" placeholder="Search distributor here...">
      <button class="btn">Search</button>
    </div>
  </div>
</div>
<br>
<br>

{{-- Show the distributor lists from database --}}    
    <div class="flex-container" >  
       @foreach ($products as $prod) 
          <div class="card">
            <a href = "/dashboard/products/prod/{{ $prod->id}}">
              <img src="{{ $prod->Image_Harv }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"> {{ $prod->Harv_Name }}</h5>
                <p class="card-text">
                </p>
              </div>
            </a>
          </div>
      @endforeach           
    </div>
@endcan

@endsection
