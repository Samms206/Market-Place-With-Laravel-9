@extends('layouts.navbar')

@section('title','Order')

@section('content')
<button type="submit" class="btn btn-primary">Add new</button>
<table class="table mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Buyer_id</th>
            <th>Product_id</th>
            <th>Qty</th>
            <th>Grand Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listOrders as $item)            
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->buyer_id }}</td>
            <td>{{ $item->product_id }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->grand_total }}</td>
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