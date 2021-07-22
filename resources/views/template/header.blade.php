<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="@yield('title', 'PT Raja Teknik Aditama - Custom Made Parts Specialist')">
    <meta property="og:type" content="website">
    <meta property="og:description" content="@yield('meta-description', 'PT Raja Teknik Aditama specializes in custom-made parts, engineering products and spare&nbsp; parts.')">
    <meta property="og:site_name" content="PT Raja Teknik Aditama (RTA)">
    <meta property="og:url" content="https://rtateknik.com/">
    <link rel="canonical" href="https://rtateknik.com/">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/gallery/index.css') }}" />
    <link rel="icon" href="{{ asset('assets/images/icon.jpg') }}" />

    <title>PT Raja Teknik Aditama - Custom Made Parts Specialist</title>
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
                    @if($submenu->parent_id == 1)
                      <li> <a class="dropdown-item" href="{{ url('about/'.$submenu->parent_id .'/'. $submenu->slug) }}">{{ $submenu->name }}</a></li>
                    @else
                      <li> <a class="dropdown-item" href="{{ url('content/'.$submenu->parent_id .'/'. $submenu->slug) }}">{{ $submenu->name }}</a></li>
                    @endif
                @endforeach
              </ul>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link link-dark" href="{{ url($menus->slug) }}" tabindex="-1" aria-disabled="true">{{ $menus->name }}</a>
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

