@extends('layout')
@section('content')    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Choose a Distributor and Product
                </div>
                <div class="card-body">
                    <form action="{{route('offering.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="distributor">Distributor</label>
                            <select name="distributor_id" id="distributor" class="form-control">
                                @foreach ($distributors as $distributor)
                                    <option value="{{ $distributor->id }}">{{ $distributor->cust_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product selection -->
                        <div class="form-group">
                            <label for="product">Product</label>
                            <select name="product_name" id="product" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product->harv_name }}">{{$product->farmer_name}} - {{ $product->harv_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Quantity input -->
                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" id="qty" name="qty" class="form-control" placeholder="Enter quantity">
                        </div>

                        <!-- Total price input -->
                        <div class="form-group">
                            <label for="total_price">Total Price</label>
                            <input type="number" id="total_price" name="total_price" class="form-control" placeholder="Enter total price">
                        </div>

                        <!-- Notes input -->
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea id="notes" name="notes" class="form-control" placeholder="Enter any notes"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

