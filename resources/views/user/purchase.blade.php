@extends('layouts.navbar')

@section('title','Purchase')

@section('content')
<div class="card mb-2">
  <div class="card-header">
    <h5 class="card-title d-flex justify-content-between">
      <input type="text" value="Hasil Pembelian" class="form-control" style="border: none; background: 0%; font-weight: bold; font-size: 20px" disabled>
      <form class="form-inline" action="#">
        <select class="custom-select my-1 mr-sm-2 form-control d-inline" id="sort_by" onchange="window.location.href='/purchase?sort_by=' + this.value">
          <option selected>Shorting</option>
          <option value="all">All</option>
          <option value="today">Today</option>
          <option value="week">This Week</option>
          <option value="month">This Month</option>
        </select>
      </form>
    </h5>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Tanggal Pembelian</th>
          <th>Jumlah</th>
          <th>Status</th>
          <th>Total Harga</th>
        </tr>
      </thead>
      <tbody>
        @php
          $total = 0;
        @endphp
        @foreach($listPurchases as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
            @foreach($item->product as $data)
            <td>{{ $data->name }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $item->date }}</td>
            @endforeach
          <td>{{ $item->qty }}</td>
          <td>selesai</td>
          <td>{{  $item->grand_total }}</td>
          @php
            $total += $item->grand_total;
          @endphp
        </tr>
        @endforeach
        <tr>
          <td colspan="6" class="text-right font-weight-bold">
            Total
          </td>
          <td class="font-weight-bold">
            Rp. {{ number_format($total, 0, ",", ".") }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@endsection