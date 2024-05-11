@extends('layout')
@section('content')
    <div class="container">
        <h4 class="mt-4">Order Form</h4>
        <form action="{{ route('order.post') }}" method="post">
            @csrf
            <div class="form-group">
                <input hidden type="text" class="form-control" value="{{ $product->farmer_id }}" name="farmer_id">
                <label for="exampleInputEmail1">Nama Product</label>
                <input readonly type="text" class="form-control" value="{{ $product->harv_name }}" name="harv_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Product</label>
                <input readonly type="text" class="form-control" value="{{ $product->harv_name }}" name="harv_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Petani</label>
                <input readonly type="text" class="form-control" value="{{ $product->farmer_name }}" name="farmer_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Stock</label>
                <input readonly id="stock" type="text" class="form-control" value="{{ $product->harv_stock }}"
                    name="farmer_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input id="price" readonly type="text" class="form-control" value="{{ $product->harv_price }}"
                    name="price">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Qty</label>
                <input id="qty" type="text" class="form-control" name="qty">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Total Price</label>
                <input type="text" id="total_price" class="form-control" name="total_price" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            // Attach a change event listener to the input field
            $('#qty').change(function() {
                // Get the current value of the input field

                if (parseInt($('#qty').val()) > parseInt($('#stock').val())) {
                    const res = parseInt($('#qty').val()) - parseInt($('#stock').val());
                    Swal.fire({
                        title: 'Out of Stock',
                        text: 'kamu membutuhkan sekitar ' + res + 'pcs lagi',
                        icon: 'info',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#qty').val($('#stock').val())
                        }
                    });

                }
                let inputValue = $(this).val();
                const price = $('#price').val();
                const res = parseInt(inputValue) * parseInt(price);
                let total_value = $('#total_price').val(res);
                console.log('The input value has changed to: ' + res);
            });
        });
    </script>
@endsection
