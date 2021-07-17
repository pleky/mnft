@include('template.header')
@if(Request::segment(1) != 'detail-gallery' )
    @include('template.slider')
@endif

    @yield('content')

@include('template.footer')
@stack('scripts')

