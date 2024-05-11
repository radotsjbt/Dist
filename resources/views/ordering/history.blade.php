@extends('layout')
@section('content')
    <div class="container mt-5">
        <h2>Order History</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Order Id</th>
                    <th>Product Name</th>
                    <th>Ordering By</th>
                    <th>Farmer Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $product->order_id }}</td>
                        <td>{{ $product->Product->harv_name }}</td>
                        <td>{{ $product->user->name }}</td>
                        <td>{{ $product->Product->farmer_name }}</td>
                        <td>
                            <form action="{{ route('accept.ordering', $product->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                            <form action="{{ route('decline.ordering', $product->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Decline</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
