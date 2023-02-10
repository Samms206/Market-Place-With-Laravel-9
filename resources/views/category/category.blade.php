@extends('layouts.navbar')

@section('title','Category')

@section('content')
<button type="submit" class="btn btn-primary">Add new</button>
<table class="table mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listCategory as $item)            
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <a href="#" class="btn btn-success">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection