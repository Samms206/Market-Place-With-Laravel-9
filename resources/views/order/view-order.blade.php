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
      Stock: {{ $product->stok }}
      <form action="/confirm-product/{{ $product->id }}" class="mt-2">
        <div class="form-group">
          <label for="spinner">Quantity:</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary" type="button" id="minusBtn">-</button>
            </div>
            <input type="text" name="qty" class="input-group-text" id="spinner" value="0" min="0">
            <div class="input-group-append" style="width: 10px">
              <button class="btn btn-outline-secondary" type="button" id="plusBtn">+</button>
            </div>
          </div>
        </div>
        <div class="d-inline">
          <a href="" class="btn btn-primary">Chart</a>
          <button id="buy" type="submit" class="btn btn-warning">Buy</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
    var spinner = document.getElementById("spinner");
    var submitBtn = document.getElementById('buy');
    spinner.addEventListener("mouseover", function() {
      if (spinner.value == 0) {
        submitBtn.setAttribute("disabled", true);
      } else {
        submitBtn.removeAttribute("disabled");
      }
      });
    });
    // 
    document.querySelector("#plusBtn").addEventListener("click", function() {
      let spinner = document.querySelector("#spinner");
      spinner.value = parseInt(spinner.value) + 1;
      if (spinner.value == 0) {
        submitBtn.setAttribute("disabled", true);
      } else {
        submitBtn.removeAttribute("disabled");
      }
    });
    document.querySelector("#minusBtn").addEventListener("click", function() {
      let spinner = document.querySelector("#spinner");
      if (spinner.value > 0) {
        spinner.value = parseInt(spinner.value) - 1;
      }
    });
  </script>
@endsection