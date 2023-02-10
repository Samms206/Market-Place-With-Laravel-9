@extends('layouts.navbar')

@section('title','Order')

@section('content')
<div class="d-flex">
    <img src="{{ asset('storage/photo/'.$product->image) }}" alt="img" style="width: 400px; height: 400px;">
    <div class="d-flex flex-column pl-3 m-3">
      <h2>{{ $product->name }}</h2>
      <h1 style="color: dodgerblue">{{ "Rp".number_format($product->price,2,',','.') }}</h1>
      Description:
      <p>{{ $product->description }}</p>
      <form action="/order" method="post">
        @csrf
        <input type="hidden" name="buyer_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
        <div class="form-group mb-3">
          <label for="spinner">Quantity:</label>
          <input name="qty" class="input-group-text" id="spinner" value="{{ $_GET['qty']; }}" min="0" name="qty" readonly>
        </div>
        <div class="d-inline">
          <button type="submit" class="btn btn-success">Confirm</button>
        </div>
      </form>
    </div>
  </div>
@endsection