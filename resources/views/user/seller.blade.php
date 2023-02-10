@extends('layouts.navbar')

@section('title','Seller')

@section('content')
<table class="table mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($listSeller as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->alamat }}</td>
            <td>
                <a href="#" class="btn btn-primary">Detail</a>
                <a href="#" class="btn btn-success">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection