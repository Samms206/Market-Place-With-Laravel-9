@extends('layouts.navbar')

@section('title','Home')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <div class="sortby">
        <select name="" id="" class="form-control" style="width: 120px">
            <option value="">SortBy</option>
            <option value="">category</option>
            <option value="">Populer</option>
        </select>
    </div>
    <div class="text-center" style="font-size: 25px; color: dodgerblue"><b>Marketplace</b></div>
    
    <form action="" method="GET" >
        <div class="search">
            <input type="text" class="form-control" name="keyword" placeholder="search...">
            <button class="input-group-text btn-btn-primary">Search</button>
        </div>
    </form>

</div>

<div class="row">
    @foreach ($listProduct as $item)
        <div class="col-6 col-md-2 mb-3" onclick="window.location.href='/view-product/{{ $item->id }}'">
            <div class="card">
                <img src="{{ asset('storage/photo/'.$item->image) }}" alt="img" class="card-img-top" alt="shoes"  style="width: 150px; height: 150px;">
                <div class="card-body">
                    <?php
                    global $pnjng;
                    global $x;
                    $pnjng = Str::length($item->name);
                        if ($pnjng > 14) {
                            $x = substr($item->name, 0, 14) . "...";
                        }else{
                            $x = $item->name;
                        }
                    ?>
                    <p class="card-title">{{ $x }}</p>
                    <p style="color: dodgerblue" class="card-text">Rp{{ number_format($item->price,2,',','.') }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection