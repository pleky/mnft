@extends('template.index')

@section('content')
    <!-- hero -->
    <section class="hero">
        <div class="container">
            <div class="hero-image">
                <img class="img-fluid" src="{{ url('images/gallery/'.$gallery->image) }}" alt="">
            </div>
        </div>
    </section>
    <!-- end hero -->


    <section class="mt-3 mb-5">
        <div class="container">
            <h5 class="mt-5">Project Description</h5>
            <div class="heading mt-3">
                <h4 class="text-primary-dark">{{ $gallery->title }}</h4>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {!! $gallery->description !!}
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <img class="img-fluid" src="{{ url('images/gallery/'.$gallery->photo_1) }}" alt="">
                        </div>  
                        <div class="col-md-12 mt-5 mb-5">
                            <img class="img-fluid" src="{{ url('images/gallery/'.$gallery->photo_2) }}" alt="">
                        </div>  
                        <div class="col-md-12 mt-5">
                            <img class="img-fluid" src="{{ url('images/gallery/'.$gallery->photo_3) }}" alt="">
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
