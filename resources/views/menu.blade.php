<!DOCTYPE html>
<html lang="en">
<head>
    <title> Restaurant Feliciano </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>

<!-- Top Bar -->
<div class="py-1 bg-black top">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+1235 2355 98</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">youremail@email.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                        <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>8:00AM - 9:00PM</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Feliciano</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                <li class="nav-item active"><a href="{{ url('/menu') }}" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="{{ url('/blog') }}" class="nav-link">Stories</a></li>
                <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            @if(Auth::user()->is_admin)
                            <li class="nav-item"><a href="{{route('admin.index')}}" class="nav-link">
                                Dashboard</a></li>
                            @else
                                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            @endif
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"> <a href="{{ route('register') }}" class="nav-link">
                                    Register</a></li>
                            @endif
                        @endauth
                    @endif
                </li>

                <li class="nav-item cta"><a href="{{ url('/reservation') }}"  class="nav-link">Book a table</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END Navigation Bar -->

<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<!-- END Hero Section -->

<!-- Menu Section -->
<section class="ftco-section">
    <div class="container">
        <div class="ftco-search">
            <div class="row">
        <div class="col-md-12 nav-link-wrap">
        <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @foreach ($categories as $category)
                <a class="nav-link ftco-animate " data-toggle="pill" href="#category-{{ $category->id }}" role="tab" aria-controls="category-{{ $category->id }}" aria-selected="false">{{ $category->name }}</a>
            @endforeach
        </div>


        <!-- Section des plats -->
        <div>

            <div class="tab-content" id="v-pills-tabContent">
                @foreach ($categories as $category)
                <div class="tab-pane fade show active" id="category-{{ $category->id }}" role="tabpanel" aria-labelledby="category-{{ $category->id }}-tab">
                    <div class="d-flex flex-wrap row no-gutters">

                        @foreach ($category->menus as $menu)
                        <div class="col-md-6">
                            <form wire:submit.prevent="addToCart({{ $menu->id }})" method="POST">
                                @csrf
                                <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                    <div class="menu-img img" style="background-image: url('{{Storage::url($menu->image)}}');"></div>
                                    <div class="text d-flex align-items-center">
                                        <div>
                                            <div class="d-flex">
                                                <div class="one-half">
                                                    <h3>{{ $menu->name }}</h3>
                                                </div>
                                                <div class="one-forth">
                                                    <span class="price">{{ $menu->price }}DH</span>
                                                </div>
                                            </div>
                                            <p>{{ $menu->ingredients }}</p>


                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>
            </div>
            @endforeach
            </div>

        </div>

                    </div>
    </div>

        </div>
    </div>
</section>
<!-- END Menu Section -->

<!-- Footer Section -->
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Feliciano</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Open Hours</h2>
            <ul class="list-unstyled open-hours">
              <li class="d-flex"><span>Monday</span><span>9:00 - 24:00</span></li>
              <li class="d-flex"><span>Tuesday</span><span>9:00 - 24:00</span></li>
              <li class="d-flex"><span>Wednesday</span><span>9:00 - 24:00</span></li>
              <li class="d-flex"><span>Thursday</span><span>9:00 - 24:00</span></li>
              <li class="d-flex"><span>Friday</span><span>9:00 - 02:00</span></li>
              <li class="d-flex"><span>Saturday</span><span>9:00 - 02:00</span></li>
              <li class="d-flex"><span>Sunday</span><span> 9:00 - 02:00</span></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Instagram</h2>
            <div class="thumb d-sm-flex">
                  <a href="#" class="thumb-menu img" style="background-image: url(images/insta-1.jpg);">
                  </a>
                  <a href="#" class="thumb-menu img" style="background-image: url(images/insta-2.jpg);">
                  </a>
                  <a href="#" class="thumb-menu img" style="background-image: url(images/insta-3.jpg);">
                  </a>
              </div>
              <div class="thumb d-flex">
                  <a href="#" class="thumb-menu img" style="background-image: url(images/insta-4.jpg);">
                  </a>
                  <a href="#" class="thumb-menu img" style="background-image: url(images/insta-5.jpg);">
                  </a>
                  <a href="#" class="thumb-menu img" style="background-image: url(images/insta-6.jpg);">
                  </a>
              </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
            <form action="#" class="subscribe-form">
              <div class="form-group">
                <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="form-control submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>



<!-- JavaScript -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&sensor=false"></script>
<script src="{{ asset('js/google-map.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
