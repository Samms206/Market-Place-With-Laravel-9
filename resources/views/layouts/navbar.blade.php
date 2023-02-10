<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
    <title>@yield('title') Page</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
        <nav class="navbar bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">
                <img src="https://i.ibb.co/VTDR875/logo.png" alt="none" width="30" height="24">
                </a>
            </div>
            </nav>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- autentikasi --}}
              @if(!Auth::check())
                <li class="nav-item">
                  <a class="nav-link " href="/login" style="border: 4px">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="/register">Register</a>
                </li>
                {{-- autentikasi --}}
                {{-- user --}}
              @endif
              <li class="nav-item">
                <a class="nav-link " href="/">Home</a>
              </li>
              @if(Auth::check())
                @if(Auth::user()->type ==1 || Auth::user()->type ==2)
                  <li class="nav-item dropdown d-flex justify-center">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Profile
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/profile">My Account</a></li>
                      <li><a class="dropdown-item" href="/purchase">Purchase</a></li>
                      <li><a class="dropdown-item" href="#">Notifycation</a></li>
                      <li><a class="dropdown-item" href="#">Voucers</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#">Charts</a>
                  </li>
                  @if(Auth::user()->type == 1)
                  <li class="nav-item">
                    <a class="nav-link " href="/products-seller">Product</a>
                  </li>
                  @endif
                {{-- user --}}
                {{-- Admin --}}
                @else
                
                <li class="nav-item">
                  <a class="nav-link " href="#">Dashboard</a>
                </li>
                <li class="nav-item dropdown d-flex justify-center">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Users member
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/buyers">Buyers Data</a></li>
                    <li><a class="dropdown-item" href="/sellers">Sellers member</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown d-flex justify-center">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Products
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/products">Products</a></li>
                    <li><a class="dropdown-item" href="/categories">Category</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown d-flex justify-center">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Orders
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/orders">Oders</a></li>
                    <li><a class="dropdown-item" href="#">-</a></li>
                  </ul>
                </li>
              </ul>
              @endif
            @endif
          </div>
        </div>
    </nav>
    {{--  --}}
    <br>
    <div class="container mt-5">
        <br>
        @yield('content')
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>