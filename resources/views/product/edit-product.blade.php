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

        <form action="/products/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="hidden" name="seller_id" value="{{ Auth::user()->id }}">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}">
            </div>
            
            <label for="name" class="mb-3">Categories</label>
            @foreach ($categories as $category)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categories[]" 
                value="{{ $category->id }}" {{ in_array($category->id, $product_category_id) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $category->name }}</label>
            </div>
            @endforeach

            <div class="mb-3">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Ex : 150000xx" value="{{ $data->price }}">
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $data->description }}">
            </div>
            <div class="mb-3">
                <label for="stok">Stock</label>
                <input type="text" name="stok" id="stok" class="form-control" value="{{ $data->stok }}">
            </div>
            <div class="mb-3">
                <label for="photo">Photo</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="photo" name="image" value="{{ asset('storage/photo/'.$data->image) }}">
                </div>
            </div>
            <div class="my-3 d-flex justify-content-center">
                @if ($data->image != '')
                    <img src="{{ asset('storage/photo/'.$data->image) }}" alt="" width="200px">   
                @else
                    <img src="{{ asset('storage/photo/blank.png') }}" alt="" width="200px">
                @endif
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">update Product</button>
            </div>
        </form>
    </div>

@endsection