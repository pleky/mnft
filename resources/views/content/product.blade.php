@extends('template.index')

@section('content')
<!-- Porduct desc -->
<section class="product mt-3 mt-lg-5 pt-lg-5">
    <div class="container">
    <div class="heading">
        <h3 class="text-primary-dark fw-light">{{ $content->name }}</h3>
    </div>

    <div class="row">
        <div class="col-md-8 product-desc">
            <p>{{ $content->description }}</p>
        </div>
        <div class="col-md-4">
            <div class="product-img">
                <img class="rounded h-100 w-100" src="{{ url('images/'.$content->image) }}" alt="">
            </div>
        </div>
    </div>
    <!-- div row -->
    </div>
    <!-- div container -->
</section>
<!-- end Product desc -->


<!-- gallery -->
<section class="gallery bg-dark-secondary mt-3">
    <div class="container">
    <div class="heading">
        <h4 class="text-primary-dark fw-light">Product Gallery</h3>
    </div>
    <!-- heading -->
    <div class="row">
        @foreach($gallery as $data)
            <div class="col-md-2">
                <div class="gallery-item">
                    <img class="rounded h-100 w-100" src="{{ url('images/'.$data->image) }}" alt="">
                </div>
            </div>
        @endforeach
    </div>
    <!-- row -->
    </div>
</section>
<!-- end galler -->
@endsection