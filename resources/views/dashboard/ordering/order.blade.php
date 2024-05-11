
@extends('dashboard.layouts.main')

@section('container')


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Let's ordering some products, {{ auth()->user()->username }}!</h5>

    <!-- Ordering Form -->
    <form action= "/dashboard/ordering/index/{{ $product->id }}" method="post" 
    enctype="multipart/form-data" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="inputProdName">Product Name</label>
          <input type="text" name="inputProdName"class="form-control" id="inputProdName" value="{{ $product->Harv_Name }}" disabled>
      </div>

      <div class="col-md-6">
        <label for="inputHarvStock">Stock (/kg)</label>
          <input type="text" name="inputHarvStock"class="form-control" id="inputHarvStock" value="{{ $product->Harv_Stock }}" disabled>
      </div>

      <div class="col-md-6">
        <label for="inputQty">Quantity (/kg)</label>
          <input type="text" name="inputQty"class="form-control" id="inputQty" placeholder="ex : 250">
      </div>

      <div class="col-md-6">
        <label for="inputTotalPrice">Price</label>
          <div class="input-group col-sm-10">
            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
            <input id="price" readonly type="text" class="form-control" value="{{ $product->Harv_Price }}"
                    name="price" disabled>
          </div>
      </div>

      <div class="col-md-6">
        <label for="inputTotalPrice">Total Price</label>
          <div class="input-group col-sm-10">
            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
            <input type="text" name="inputTotalPrice" class="form-control" id="inputTotalPrice" placeholder="ex : 240000" required>
          </div>
      </div>
      
      <div class="inputNotes col-md-6">
        <label for="inputNotes">Notes</label>
        <input type="text" name="inputNotes" class="form-control" id="inputNotes">
      </div>

      <div class="text-center mt-5">
        <button type="submit" class="btn btn-primary">Send order</button>
      </div>

</form>

  </div>
</div>

<script>
  $(document).ready(function() {
      // Attach a change event listener to the input field
      $('#inputQty').change(function() {
          // Get the current value of the input field

          if (parseInt($('#inputQty').val()) > parseInt($('#inputHarvStock').val())) {
              const res = parseInt($('#inputQty').val()) - parseInt($('#inputHarvStock').val());
              Swal.fire({
                  title: 'Out of Stock',
                  text: 'kamu membutuhkan sekitar ' + res + 'pcs lagi',
                  icon: 'info',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.isConfirmed) {
                      $('#inputQty').val($('#inputHarvStock').val())
                  }
              });

          }
          let inputValue = $(this).val();
          const price = $('#price').val();
          const res = parseInt(inputValue) * parseInt(price);
          let total_value = $('#inputTotalPrice').val(res);
          console.log('The input value has changed to: ' + res);
      });
  });
</script>
@endsection


