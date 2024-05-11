
@extends('dashboard.layouts.main')

@section('container')


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Rekomendasi Produk!</h5>

    <!-- Ordering Form -->
    <form action= "" method="post" 
    enctype="multipart/form-data" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="inputProdName">Distributor Name</label>
          <input type="text" name="distributor_name"class="form-control" id="distributor_name" value="">
      </div>

      <div class="col-md-6">
        <label for="inputProdName">Distributor Address</label>
          <input type="text" name="distributor_address"class="form-control" id="distributor_address" value="">
      </div>

      <div class="col-md-6">
        <label for="inputProdName">Distributor Phone</label>
          <input type="text" name="distributor_phone"class="form-control" id="distributor_phone" value="">
      </div>

      <div class="col-md-6">
        <label for="inputProdName">Distributor Email</label>
          <input type="text" name="distributor_email"class="form-control" id="distributor_email" value="">
      </div>

      <div class="col-md-6">
        <label for="inputProdName">Website</label>
          <input type="text" name="website"class="form-control" id="website" value="">
      </div>

      <div class="col-md-6">
        <label for="inputProdName">Purchase Needs</label>
          <input type="text" name="needs"class="form-control" id="needs" value="">
      </div>

      <div class="col-md-6">
        <label for="inputProdName">Quantity</label>
          <input type="text" name="qty"class="form-control" id="qty" value="">
      </div>

      <div class="col-md-6">
        <label for="inputProdName">Purchase Price</label>
          <input type="text" name="price"class="form-control" id="price" value="">
      </div>
      <div class="col-md-6">
        <label for="inputProdName">Distributor Product Name</label>
          <input type="text" name="dp_name"class="form-control" id="dp_name" value="">
      </div>
      <div class="col-md-6">
        <label for="inputProdName">Distributor Product Desc</label>
          <input type="text" name="dp_desc"class="form-control" id="dp_desc" value="">
      </div>

      <div class="col-md-6">
        <label for="inputProdName">Image URL</label>
          <input type="text" name="url"class="form-control" id="url" value="">
      </div>

      <div class="text-center mt-5">
        <button type="submit" class="btn btn-primary">Submit</button>
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


