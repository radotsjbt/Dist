@extends('layout')
@section('content')

    <div class="container mt-4">
        <form action="{{route('search.product')}}" method="post">
            @csrf
            <div class="form-group">
                <div class="row">
                    <input type="text" class="form-control" placeholder="seacrh here...." name="search">
                    <button class="btn btn-primary p-2 mt-2" type="submit">Search</button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4"> <!-- Mengatur setiap kartu untuk mengambil 4 kolom pada layar medium -->
                <div class="card">
                    <div class="card-body">
                        <img src="{{$product->image_harv}}" alt="" class="img-fluid"> <!-- Menambahkan class img-fluid untuk responsif -->
                        <h5 class="card-title">{{ $product->harv_name }}</h5>
                        <p class="card-text">{{ $product->harv_price }}</p>
                        <p class="card-text">{{ $product->farmer_name }}</p>
                        <a class="btn btn-info" href="{{route('order.form',$product->id)}}">Order</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    @endsection