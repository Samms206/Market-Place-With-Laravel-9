@extends('layouts.navbar')

@section('title','Product')

@section('content')
<a href="/add-product" class="btn btn-primary">Add new</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listProduct as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->description }}</td>
            <td>
                @if ($item->image != '')
                    <img src="{{ asset('storage/photo/'.$item->image) }}" alt="" width="75px">   
                @else
                    <img src="{{ asset('storage/photo/blank.png') }}" alt="" width="75px">
                @endif
            </td>
            <td>
                <a href="products/{{ $item->id }}" class="btn btn-primary">Detail</a>
                <a href="products/edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                <form action="products/{{ $item->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('are you sure?');">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection