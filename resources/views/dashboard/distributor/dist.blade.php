

@extends('dashboard.layouts.main')

{{-- Detail Distributor --}}
@section('container')

<a href="/dashboard/distributor/index">
    <button type="button" class="btn btn-primary mb-3" >
        <i class="ri-arrow-left-line"></i>
        Back
    </button>
</a>
<br>
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('assets/img/default.jpg') }}" alt="Profile" class="rounded-circle">
            <h2>{{ $distributor->Dist_Name }}</h2>
            <h5>{{ $distributor->Dist_ID}}</h5> 
            <div class="social-links mt-2">
                <a href="/dashboard/offering/offer/{{ $distributor->id }}" >
                    <button type="button" class="btn btn-primary">Offer</button>
                </a>
                <a href="/chat/{{ $distributor->Dist_ID }}">
                <button type="button" class="btn btn-primary">Chat</button>
                </a>
              </div>  
          </div>
        </div>
      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">

            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-purchase">Purchase Needs</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-product">Product</button>
              </li>
             
            </ul>

            {{-- overview --}}
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">ID</div>
                    <div class="col-lg-9 col-md-8">{{ $distributor->Dist_ID}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Name </div>
                  <div class="col-lg-9 col-md-8">{{ $distributor->Dist_Name }}</div>
                </div>
          
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">{{ $distributor->Dist_Address}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">{{ $distributor->Dist_Phone }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $distributor->Dist_Email}}</div>
                </div>

              </div>

              {{-- Purchase Needs --}}
                <div class="tab-pane fade profile-purchase" id="profile-purchase">
                  <h5 class="card-title">Purchase Needs</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Purchase needs</div>
                    <div class="col-lg-9 col-md-8">{{ $distributor->Purchase_Needs }}</div>
                  </div>
                </div>
              
                {{-- Products --}}
                    <div class="tab-pane fade profile-product" id="profile-product">
                      <h5 class="card-title">Products</h5>
      
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Product Name</div>
                        <div class="col-lg-9 col-md-8">{{ $distributor->DistProd_Name}}</div>
                      </div>
                    </div>
               
          </div><!-- End Bordered Tabs -->
        </div>

      </div>
    </div>
</section>


@endsection