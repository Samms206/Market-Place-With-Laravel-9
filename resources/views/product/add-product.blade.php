@extends('layouts.navbar')

@section('title','Product Add')

@section('content')
    
    <div class="mt-1  col-6 m-auto">
        {{-- menampilkan notif eror --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/products" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="seller_id" value="{{ Auth::user()->id }}">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            <label for="name" class="mb-3">Categories</label>
            @foreach ($data as $category)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categories[]" 
                value="{{ $category->id }}">
                <label class="form-check-label">{{ $category->name }}</label>
            </div>
            @endforeach

            <div class="mb-3">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control" required placeholder="Ex : 150000xx">
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="stok">Stock</label>
                <input type="text" name="stok" id="stok" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="photo">Photo</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="photo" name="image" required>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Add Product</button>
            </div>
        </form>
    </div>

@endsection