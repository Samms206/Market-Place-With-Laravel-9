@extends('layouts.navbar')

@section('title','Profile')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">    
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
            @if ($listUser->image != '')
                <img src="{{ asset('storage/photo/'.$listUser->image) }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
            @else
                <img src="{{ asset('storage/photo/blank.png') }}" class="rounded-circle img-fluid" alt="" width="150px">
            @endif
                <h3 class="my-3">{{ $listUser->store_name }}</h4>
            @if ( $listUser->type == 2)
                <h5 class="text-muted mb-1">User</h5>
            @else
                <h5 class="text-muted mb-1">Seller</h5>
            @endif
            <br>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $listUser->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $listUser->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $listUser->phone }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Password</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $listUser->password }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $listUser->alamat }}</p>
                </div>
              </div>
            </div>
          </div>
          {{--  --}}
        </div>
      </div>
      {{--  --}}
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center d-inline">
              @if(Auth::user()->type == 2)
                 <a href="/add-product" class="btn btn-primary">Upgrade</a>
              @else
              @endif
                 <a href="#" class="btn btn-success">Update</a>
            </div>
          </div>
        </div>
        {{--  --}}
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <a href="/logout" class="btn btn-danger">Logout</a>
              </div>
            </div>
          </div>
          {{--  --}}
        </div>
      </div>
    </div>
  </section>
@endsection