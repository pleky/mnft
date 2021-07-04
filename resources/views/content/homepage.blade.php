@extends('template.index')

@section('content')
    <!-- material manufacture -->
    <section class="container mt-3 mt-lg-5 pt-lg-5">
        <div class="heading">
            <h3 class="text-primary-dark fw-light">Our Speciality</h3>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                {{ $profile->description }}
            </div>
        </div>
    </section>
    <!-- end material manufacture -->

    <!-- Range of Composite Materials -->
    <section class="composite-materials bg-dark-secondary mt-5">
        <div class="container">
            <div class="heading">
            <h4 class="text-primary-dark fw-light">Our Products</h4>
            </div>
            <div class="row mt-3">
            @foreach($gallery as $data)
                <div class="col-md-3">
                    <div class="composite-materials-item mt-2">
                        <img class="rounded h-100 w-100" src="{{ url('images/'.$data->image) }}" alt="">
                    </div>
                    <p class="fw-bold text-center text-primary-dark">{{ $data->title }}</p>
                </div>
            @endforeach    
            </div>

            <a href="{{ url('/gallery') }}" class="w-100 btn btn-danger mt-4 fw-normal">READ ABOUT OUR PRODUCTS</a>
        </div>
    </section>
    <!-- end Range of Composite Materials -->
@endsection