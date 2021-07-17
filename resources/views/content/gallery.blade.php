@extends('template.index')

@section('content')
    <!-- Range of Composite Materials -->
    <section class="composite-materials bg-dark-secondary mt-5" id="image-container">
        <div class="container">
            <div class="heading">
            <h4 class="text-primary-dark fw-light">Gallery</h4>
            </div>
            <div class="row mt-3">
            @foreach($gallery as $data)
                <div class="col-md-4">
                    <a href="{{ url('detail-gallery/'.$data->id) }}" class="text-decoration-none">
                        <div class="composite-materials-item">
                            <img class="rounded h-100 w-100" src="{{ url('images/gallery/'.$data->image) }}" alt="">
                        </div>
                        <p class="fw-bold text-center text-primary-dark">{{ $data->title }}</p>
                    </a>
                </div>
            @endforeach
            </div>
            {{ $gallery->links() }}
        </div>
    </section>
    <!-- end Range of Composite Materials -->
@endsection

