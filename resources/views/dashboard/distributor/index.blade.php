
@extends('dashboard.layouts.main')

@section('container')

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

<!-- End Search Bar -->

{{-- Show the distributor lists from database --}}    
    <div class="flex-container" >  
       @foreach ($distributor as $dist) 
          <div class="card">
            <a href = "/dashboard/distributor/dist/{{ $dist->id}}">
              <img src="{{ asset("assets/img/default.jpg") }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"> {{ $dist->Dist_Name }}</h5>
                <p class="card-text">
                </p>
              </div>
            </a>
          </div>
      @endforeach           
    </div>
@endsection
