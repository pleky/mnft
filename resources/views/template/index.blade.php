@include('template.header')

@if(Request::segment(1) !== 'detail-gallery' && Request::segment(4) !== 'secondary-parent' && Request::segment(4) !== 'subsubmenu')
    @include('template.slider')
@endif

    @yield('content')

@include('template.footer')
@stack('scripts')

