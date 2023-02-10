@extends('layouts.navbar')

@section('title','Product')

@section('content')
<table class="table mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Store Name</th>
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
            <td><img src="{{ asset('storage/photo/'.$item->image) }}" alt="image" width="80px" height="80px"></td>
            <td>{{ $item->user->store_name }}</td>
            <td>
                <a href="products/{{ $item->id }}" class="btn btn-primary">Detail</a>
                <a href="#" class="btn btn-success">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection