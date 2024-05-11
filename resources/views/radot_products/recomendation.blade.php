@extends('layout')
@section('content')  
<div class="container mt-4">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4"> <!-- Mengatur setiap kartu untuk mengambil 4 kolom pada layar medium -->
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Name  : {{ $product->farmer_name }}</p>
                    <p class="card-text">Phone : {{ $product->farmer_phone }}</p>
                    <p class="card-text">Email : {{ $product->farmer_email }}</p>
                    <p class="card-text">Land area : {{ $product->land_area }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection