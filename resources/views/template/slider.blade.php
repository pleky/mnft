<!-- slider -->
<section class="container-fluid slider d-flex">
    <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($slider as $sliders)
            <div class="carousel-item {{ $sliders->is_order == 1 ? 'active' : '' }}" data-bs-interval="8000">
                <img src="{{ url('images/'.$sliders->image) }}" class="img-fuild w-100" alt="...">
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
{{-- <section class="p-2 d-md-block second-nav">
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
</section> --}}
<!-- end second nav -->