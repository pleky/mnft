@extends('template.index')

@section('content')
    <!-- Range of Composite Materials -->
    <section class="composite-materials bg-dark-secondary mt-5" id="image-container">
        <div class="container">
            <div class="heading">
            <h4 class="text-primary-dark fw-light">Gallery</h4>
            </div>
            <div class="row mt-3">
            <div class="col-md-3">
                <div class="composite-materials-item mt-2">
                    <img src="https://source.unsplash.com/kbwQXp3MBi4/276x200" alt="" />
                </div>
                <p class="fw-bold text-center text-primary-dark">Lorem, ipsum.</p>
            </div>
            <div class="col-md-3">
                <div class="composite-materials-item mt-2">
                    <img src="https://source.unsplash.com/Eb1mX9ds7sc/276x200" alt="" />
                    <p class="fw-bold text-center text-primary-dark">Lorem, ipsum.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="composite-materials-item mt-2">
                    <img src="https://source.unsplash.com/LWPAWvTy1NU/276x200" alt="" />
                    <p class="fw-bold text-center text-primary-dark">Lorem, ipsum.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="composite-materials-item mt-2">
                    <img src="https://source.unsplash.com/2rVOFRFWCZU/276x200" alt="" />
                     <p class="fw-bold text-center text-primary-dark">Lorem, ipsum.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="composite-materials-item mt-2">
                    <img src="https://source.unsplash.com/-m2yzI-YUSA/276x200" alt="" />
                     <p class="fw-bold text-center text-primary-dark">Lorem, ipsum.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="composite-materials-item mt-2">
                    <img src="https://source.unsplash.com/c5fT6LlgRv8/276x200" alt="" />
                     <p class="fw-bold text-center text-primary-dark">Lorem, ipsum.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="composite-materials-item mt-2">
                    <img src="https://source.unsplash.com/Id7saSyDlu0/276x200" alt="" />
                     <p class="fw-bold text-center text-primary-dark">Lorem, ipsum.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="composite-materials-item mt-2">
                    <img src="https://source.unsplash.com/ADBOC3UP4eQ/276x200" alt="" />
                     <p class="fw-bold text-center text-primary-dark">Lorem, ipsum.</p>
                </div>
            </div>
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
