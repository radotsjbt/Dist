<!-- product_card.blade.php -->

<div class="col-md-4 product-card">
    <div class="card">
        <img src="{{ $product->Image_Harv }}" class="card-img-top" alt="Product Image" style="max-height: 200px;">
        <div class="card-body">
            <h5 class="card-title title">{{ $product->Harv_Name }}</h5>
            <p class="card-text">Price: {{ number_format($product->Harv_Price) }}</p>
            <p class="card-text">Stock: {{ $product->Harv_Stock }}</p>
            <a  href="{{ route('detailProduk', $product->id) }}" class="btn btn-primary">View Details</a>
       
            <!-- You can add more details here -->
        </div>
    </div>
</div>
