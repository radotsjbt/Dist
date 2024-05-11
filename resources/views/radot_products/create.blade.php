@extends('layout')
@section('content')
    <div class="container mt-4">
        <h2>Import Products</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="fileInput">Choose file</label>
                <input type="file" name="file" id="fileInput" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
@endsection
