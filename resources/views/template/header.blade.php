<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="About Us - PT Raja Teknik Aditama (RTA)">
    <meta property="og:type" content="website">
    <meta property="og:description" content="PT Raja Teknik Aditama specializes in custom-made parts, engineering products and spare&nbsp; parts. We offer high-tech precision machinery parts for specific application toimprove parts lifetime, machine efficiency and productivity. Our flexibilty allow us to provide the best services to our customer for new build or repair parts programme to set the most economical solutions. &nbsp;">
    <meta property="og:site_name" content="PT Raja Teknik Aditama (RTA)">
    <meta property="og:url" content="https://rtateknik.com/">
    <link rel="canonical" href="https://rtateknik.com/">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="icon" href="{{ asset('assets/images/logo.jpg') }}" />

    <title>Raja Teknik Aditama</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white fixed-top" id='navbar_top'>
    <div class="container">
    <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/logo.jpg') }} " width="250"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav ms-auto">
        @foreach($menu as $menus)
          @if($menus->submenu)
            <li class="nav-item dropdown" id="myDropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ $menus->name }}</a>
              <ul class="dropdown-menu">
                @foreach($menus->submenu as $submenu)
                    <li> <a class="dropdown-item" href="{{ $submenu->parent_id }}/{{ $submenu->slug }}">{{ $submenu->name }}</a></li>
                @endforeach
              </ul>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link link-dark" href="/industry" tabindex="-1" aria-disabled="true">{{ $menus->name }}</a>
            </li>
          @endif
        @endforeach
        <li class="nav-item ">
          <a href="#contact-us" class="btn btn-danger rounded-button mt-1" tabindex="-1" role="button" aria-disabled="true">Contact Us</a>
        </li>
      </ul>
    </div>
    <!-- navbar-collapse.// -->
    </div>
    <!-- container-fluid.// -->
    </nav>

    <div class='w-100 tt'></div>

      <!-- slider -->
      <section class="container-fluid slider d-flex">
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach($slider as $sliders)
            <div class="carousel-item {{ $sliders->is_order == 1 ? 'active' : '' }}" data-bs-interval="8000">
              <img src="{{ url('upload/sliders/'.$sliders->image) }}" class="img-fuild w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="animate__animated animate__bounce animate__delay-1s">{{ $sliders->title }}</h5>
                <p>{{ $sliders->description }}</p>
              </div>
            </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>
      <!-- end slider -->

      <!-- second nav -->
      <section class="p-2 d-md-block second-nav">
        <div class="container content-wrapper">
          <div class="d-flex flex-column justify-content-center align-items-center icon-wrapper">
            <i data-feather="mail"></i>
            <span class='text-white'>{{ $profile->email }}</span>
          </div>
          <div class="d-flex flex-column justify-content-center align-items-center icon-wrapper">
            <i data-feather="phone"></i>
            <span class='text-white'>{{ $profile->phone }}</span>
          </div>
          <a href='#contact-us' class='d-flex flex-column justify-content-center align-items-center icon-wrapper text-decoration-none'>
              <i data-feather="user"></i>
              <span class='text-white'>contact us</span>
          </a>
        </div>
      </section>
      <!-- end second nav -->
