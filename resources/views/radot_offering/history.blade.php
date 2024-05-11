@extends('layout')
@section('content')
    <div class="container mt-5">
        <h2>Offering History</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Distributor Name</th>
                    <th>Farmer Name</th>
                    <th>Qty</th>
                    <th>Product Name</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($offerings as $offering)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $offering->distributor->cust_name }}</td>
                        <td>{{ $offering->farmer->name }}</td>
                        <td>{{ $offering->qty }}</td>
                        <td>{{ $offering->product_name }}</td>
                        <td>{{ $offering->total_price }}</td>
                        <td>
                            <form action="{{ route('offering.accept', $offering->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                            <form action="{{ route('offering.decline', $offering->id) }}" method="POST"
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
