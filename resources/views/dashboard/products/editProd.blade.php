
@extends('dashboard.layouts.main')
@section('container')



<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit your product, {{ auth()->user()->username }}!</h5>

    <!-- Add product Form -->
    <form action="/dashboard/products/update/{{ $products->id }}" method="post" enctype="multipart/form-data" class="row g-3">
      @csrf
      {{-- @method('PUT') --}}
      <div class="col-md-12">
        <label for="inputHarvName">Harvest Name</label>
          <input type="text" value="{{ $products->Harv_Name }}" name="inputHarvName"class="form-control" id="inputHarvName" placeholder="Ex : Tomato, Spinach" required>
          <div class="invalid-feedback">Please enter your product name!</div>
      </div>

      <div class="col-md-6">
        <label for="inputHarvDesc">Harvest Description</label>
        <input type="text" value="{{ $products->Harv_Desc }}" name="inputHarvDesc" class="form-control" id="inputHarvDesc" placeholder="Ex : High quality tomatoes " required>
      </div>

      <div class="col-md-6">
        <label for="inputHarvPrice">Price (/kg)</label>
          <div class="input-group col-sm-10">
            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
            <input type="text" value="{{ $products->Harv_Price }}" name="inputHarvPrice" class="form-control" id="inputHarvPrice" placeholder="Ex : 12000" required>
            <div class="invalid-feedback">Please input your product's price!</div>
          </div>
      </div>
      
      @if($products->Image_Harv)
        <img src="{{ $products->Image_Harv }}" style="height: 100px; width: 150px;">
      @endif
      <div class="inputGroupImage col-md-6">
        <div class="inputGroupImage col-md-6">
          <label for="inputGroupImage">Harvest Product Image</label>
          <input class="form-control" type="file" id="inputGroupImage" name="inputGroupImage">
        </div>
      </div>

      <div class="col-md-5">
        <label for="inputHarvType">Harvest Type</label>
        <div class="input-group ">
          <select class="form-select mt-0" id="floatingSelect"  name="inputHarvType" aria-label="Harvest Type">
            <option selected>{{ $products->Harv_Type }}</option>
            <option value="Vegetable">Vegetable</option>
            <option value="Fruit">Fruit</option> 
          </select>
        </div>
      </div>

      <div class="col-md-2">
        <label for="inputHarvStock">Stock </label>
        <div class="input-group">
          <input type="text" value="{{ $products->Harv_Stock }}" name="inputHarvStock" class="form-control" id="inputHarvStock" placeholder="Ex : 120" required>
          <div class="invalid-feedback">Please input your product's stock!</div>
        </div>
      </div>

      <div class="text-center mt-5">
        <button type="submit" class="btn btn-primary">Update product</button>
      </div>

</form>

  </div>
</div>

@endsection