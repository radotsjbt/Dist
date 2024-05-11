
@extends('dashboard.layouts.main')
@extends('dashboard.layouts.template')

@section('container')

@can('FarmerCheck')
<body>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome back, {{ auth()->user()->username }} !</h1>

</div>
<div>
  <h5>Hello this is dashboard</h5>
</div>
</body>
@endcan

@can('DistributorCheck')

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('208228a228e1f81fec76', {
    cluster: 'ap1'
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('offer-submitted', function(data) {
    alert(JSON.stringify(data));
  });
</script>
@endcan
  
  @if( auth()->user()->role === 'Distributor')

  <body>

  <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="search-bar">
                    <input type="text" class="form-control" id="search" placeholder="Search...">
                </div>
            </div>
            <div class="col-md-2">
                <div class="search-bar">
                    <button type="button"  class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>
        <div class="row">
          -
        </div>
        <div class="row" id="products-list">
            <!-- Product cards will be appended here -->
            <div class="row" id="products-list">
                @foreach($products as $product)
                    @include('partials.product_card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>


           <!-- <form action="/dashboard/notification/notif" method="post">
                    @csrf
                      <div class="form-group">
                        <label for="Purchase_Needs" class="form-label">Harvest Products That You Need </label>
                          <input type="text" id="Purchase_Needs" name="Purchase_Needs"  class="form-control" placeholder="Ex : Tomatoes, Potatoes, Spinach" required>
                      </div>
                      <div class="form-group">
                        <label for="CustProd_Name" class="form-label">Your Products</label>
                          <input type="text" id="CustProd_Name" name="CustProd_Name" class="form-control" placeholder="Ex : Potabee, Belibis Tomato" required>
                      </div>
                      <div class="form-group">
                        <label for="CustProd_Desc" class="form-label">Your Product's Description</label>
                          <input type="text" id="CustProd_Desc" name="CustProd_Desc"  class="form-control" placeholder="Ex : I need potato for Potabee's production" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
            </form> -->
  @endif

  
<script>
    $(document).ready(function() {
        $('#search').on('input', function() {
            var searchText = $(this).val().toLowerCase();
            $('#products-list .product-card').each(function() {
                var productTitle = $(this).find('.title').text().toLowerCase();
                console.log(productTitle);
                if (productTitle.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
  </body> 
@endsection
