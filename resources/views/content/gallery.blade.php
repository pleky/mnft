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
                    <div class="composite-materials-item mt-2">
                        <img class="rounded h-100 w-100" src="{{ url('images/gallery/'.$data->image) }}" alt="">
                    </div>
                    <p class="fw-bold text-center text-primary-dark">{{ $data->title }}</p>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!-- end Range of Composite Materials -->
@endsection


@push('scripts')

<script src="{{ asset('assets/gallery/img-previewer.min.js') }}"></script>
<script>
    const a = new ImgPreviewer('#image-container', { scrollbar: true })

</script>
@endpush
