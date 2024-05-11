
@extends('dashboard.layouts.main')

@section('container')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit your offering data, {{ auth()->user()->username }}!</h5>

    <!-- Edit offering form -->
    <form action= "/dashboard/offering/update/{{$off->id }}" method="post" 
    enctype="multipart/form-data" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="inputDistName">Distributor Name</label>
          <input type="text" name="inputDistName"class="form-control" id="inputDistName" value="{{$off->Dist_Name }}" disabled>
      </div>

      <div class="col-md-6">
        <label for="inputHarvName">Harvest Result</label>
        <div class="input-group ">
          <select class="form-select mt-0" id="floatingSelect"  name="inputHarvName" aria-label="Harvest Type">
            <option selected>{{$off->Harv_Name }}</option>
              @foreach($product as $item)
                  @if(auth()->user()->username === $item->Farmer_Name)
                      <option value="{{ $item->Harv_Name }}">{{ $item->Harv_Name }}</option>
                  @endif
              @endforeach 
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <label for="inputHarvQty">Quantity (/kg)</label>
        <input type="text" value="{{$off->Qty }}" name="inputHarvQty" class="form-control" id="inputHarvQty" placeholder="ex : 20" required>
      </div>

      <div class="col-md-6">
        <label for="inputTotalPrice">Total Price</label>
          <div class="input-group col-sm-10">
            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
            <input type="text" value="{{$off->Offer_Price }}" name="inputTotalPrice" class="form-control" id="inputTotalPrice" placeholder="ex : 240000" required>
            <div class="invalid-feedback">Please input your product's price!</div>
          </div>
      </div>
      
      <div class="inputNotes col-md-6">
        <label for="inputNotes">Notes</label>
        <input type="text" value="{{$off->Notes }}" name="inputNotes" class="form-control" id="inputNotes">
      </div>


      <div class="text-center mt-5">
        <button type="submit" class="btn btn-primary">Update Offering</button>
      </div>

</form>

  </div>
</div>
@endsection


