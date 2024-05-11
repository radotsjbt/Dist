
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

  <body>

  <div class="container">
    <div class="row">
    <div class="col-md-4">
    <div class="card">
        <img src="{{ $product->Image_Harv }}" class="card-img-top" alt="Product Image" style="max-height: 200px; padding: 10px;">
        <div class="card-body d-flex flex-column align-items-center">
            <h5 class="card-title title">{{ $product->Harv_Name }}</h5>
            <p class="card-text">{{ $product->Harv_ID }}</p>
            <div class="d-flex justify-content-center">
                <a href="{{ route('orderProduk', $product->id) }}" class="btn btn-primary me-2">Order</a>
                <a href="{{ route('chat', $product->id) }}" class="btn btn-primary">Chat</a>
            </div>
            <!-- You can add more details here -->
        </div>
    </div>


    </div>
    <div class="col-md-8">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title title">Product Details</h5>
        <table style="font-size: 16px;">
            <tr>
                <td style="font-weight: lighter; padding-bottom: 10px;">
                    ID
                </td>
                <td style="padding-bottom: 10px;">
                    : {{ $product->Harv_ID }}
                </td>
            </tr>
            <tr>
                <td style="font-weight: lighter; padding-bottom: 10px;">
                    Harvest Result Name
                </td>
                <td style="padding-bottom: 10px;">
                    : {{ $product->Harv_Name }}
                </td>
            </tr>
            <tr>
                <td style="font-weight: lighter; padding-bottom: 10px;">
                    Farmer Name
                </td>
                <td style="padding-bottom: 10px;">
                    : {{ $product->farmer?->username }}
                </td>
            </tr>
            <tr>
                <td style="font-weight: lighter; padding-bottom: 10px;">
                    Farmer Address
                </td>
                <td style="padding-bottom: 10px;">
                    : {{ $product->farmer?->address }}
                </td>
            </tr>
            <tr>
                <td style="font-weight: lighter; padding-bottom: 10px;">
                    Phone
                </td>
                <td style="padding-bottom: 10px;">
                    : {{ $product->farmer?->phone  }}
                </td>
            </tr>
            <tr>
                <td style="font-weight: lighter; padding-bottom: 10px;">
                    Email
                </td>
                <td style="padding-bottom: 10px;">
                    : {{ $product->farmer?->email  }}
                </td>
            </tr>
        </table>
    </div>
</div>

    </div>
    </div>
  </div>

  </body>
@endcan
@endsection
