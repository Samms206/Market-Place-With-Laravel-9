@extends('layouts.navbar')

@section('title','Detail Product')

@section('content')
<h2 class="my-3 d-flex justify-content-center">{{ $product->user->store_name }}</h2>

<div class="my-3 d-flex justify-content-center">
    @if ($product->image != '')
        <img src="{{ asset('storage/photo/'.$product->image) }}" alt="" width="200px">   
    @else
        <img src="{{ asset('storage/photo/blank.png') }}" alt="" width="200px">
    @endif
</div>
@endsection