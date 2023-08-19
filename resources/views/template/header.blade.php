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
  <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white sticky-top header">
     <div class="container-fluid">
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
  <section class="container-fluid second-nav overflow-x-auto text-center fw-semibold no-scrollbar">
    @foreach($menu_new as $menu_new)
      <span id="second-nav-item" class="second-nav-item">{{ $menu_new->name }}</span>
    @endforeach
  </section>

  @foreach($menu_pop as $menus)
  <section class="second-nav-panel p-4 {{ $menus->slug }}" id="second-nav-panel">
    <div class="container">
        <a href="/industrial" class="fw-bold mb-4 d-block">View All {{ $menus->name }}</a>
        <div class="second-nav-content">
          <ul class="list" id="list">
            <li id="menu" data-target="menu-1" class="menu d-block">Industrial Belts</li>
            <li id="menu" data-target="menu-2" class="menu d-block">Industrial Bow</li>
            <li id="menu" data-target="menu-3" class="menu d-block">Industrial Rat</li>
          </ul>

          <div class="image-grid-container no-scrollbar d-none" id="menu-1">
            <a href="/heavy">
              <div class="bg-white grid-item ">
                <div class="image-container">
                  <img src="https://source.unsplash.com/random/50x50" class="img-fuild w-100" alt="...">
                </div>
                <p class="mb-0">V-Belt</p>
              </div>
            </a>
            <a href="/heavy">
              <div class="bg-white grid-item ">
                <div class="image-container">
                  <img src="https://source.unsplash.com/random/50x50" class="img-fuild w-100" alt="...">
                </div>
                <p class="mb-0">V-Belt</p>
              </div>
            </a>
          </div>

          <div class="image-grid-container no-scrollbar d-none" id="menu-2">
            <a href="/heavy">
              <div class="bg-white grid-item ">
                <div class="image-container">
                  <img src="https://source.unsplash.com/random/90x50" class="img-fuild w-100" alt="...">
                </div>
                <p class="mb-0">V-Belt</p>
              </div>
            </a>
            <a href="/heavy">
              <div class="bg-white grid-item ">
                <div class="image-container">
                  <img src="https://source.unsplash.com/random/90x90" class="img-fuild w-100" alt="...">
                </div>
                <p class="mb-0">V-Belt</p>
              </div>
            </a>
          </div>

          <div class="image-grid-container no-scrollbar d-none" id="menu-3">
            <a href="/heavy">
              <div class="bg-white grid-item ">
                <div class="image-container">
                  <img src="https://source.unsplash.com/random/60x60" class="img-fuild w-100" alt="...">
                </div>
                <p class="mb-0">V-Belt</p>
              </div>
            </a>
            <a href="/heavy">
              <div class="bg-white grid-item ">
                <div class="image-container">
                  <img src="https://source.unsplash.com/random/60x60" class="img-fuild w-100" alt="...">
                </div>
                <p class="mb-0">V-Belt</p>
              </div>
            </a>
          </div>
        </div>
    </div>
  </section>
  @endforeach

  <div class='w-100 tt'></div>

