
@extends('dashboard.layouts.main')

@section('container')


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Send your product, {{ auth()->user()->username }}!</h5>

    <!-- Offering Form -->
    <form action= "/dashboard/offering/index/{{ $dist->id }}" method="post" 
    enctype="multipart/form-data" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="inputDistName">Distributor Name</label>
          <input type="text" name="inputDistName"class="form-control" id="inputDistName" value="{{ $dist->Dist_Name }}" disabled>
      </div>

      <div class="col-md-6">
        <label for="inputHarvName">Harvest Result</label>
        <div class="input-group ">
          <select class="form-select mt-0" id="floatingSelect" name="inputHarvName" aria-label="Harvest Type">
            <option selected>Choose your product</option>
              @foreach($product as $item)
              {{-- check the user's product --}}
                  @if(auth()->user()->username === $item->Farmer_Name)
                      <option value="{{ $item->Harv_Name }}">{{ $item->Harv_Name }}</option>
                  @endif
              @endforeach 
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <label for="inputHarvQty">Quantity (/kg)</label>
        <input type="text" name="inputHarvQty" class="form-control" id="inputHarvQty" placeholder="ex : 20" required>
      </div>

      <div class="col-md-6">
        <label for="inputTotalPrice">Total Price</label>
          <div class="input-group col-sm-10">
            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
            <input type="text" name="inputTotalPrice" class="form-control" id="inputTotalPrice" placeholder="ex : 240000" required>
            <div class="invalid-feedback">Please input your product's price!</div>
          </div>
      </div>
      
      <div class="inputNotes col-md-6">
        <label for="inputNotes">Notes</label>
        <input type="text" name="inputNotes" class="form-control" id="inputNotes">
      </div>


      <div class="text-center mt-5">
        <button type="submit" class="btn btn-primary">Send offering</button>
      </div>

</form>

  </div>
</div>
@endsection


