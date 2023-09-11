@extends('template.index')

@section('content')
@section('title', 'RTA - ' . $content->name)
@section('meta-description', $content->name)
<!-- hero -->
<section class="hero">
    <div class="container">
        <div class="hero-image">
            <img class="img-fluid" src="{{ url('images/header_image/'.$content->header_image) }}" alt="">
        </div>
    </div>
</section>
<!-- end hero -->
<!-- Porduct desc -->
<section class="product mt-3 mt-lg-5 pt-lg-5">
    <div class="container">
    <div class="heading">
        <h3 class="text-primary-dark fw-light">{{ (!empty($sub_menu_by_type_menu)) ? ucwords(strtolower($sub_menu_by_type_menu->name)) : $content->name }}</h3>
    </div>

    <div class="row">
        <?php 
          $image = json_decode($content->image, true); 
          $imageDiv = '';
          if (is_array($image)) {
              foreach ($image as $img) {
                  $urlImage = url('images/' . $img);
                  $imageDiv .= '<div class="product-img">
                      <img class="rounded img img-fluid" src="'.$urlImage.'" alt="">
                  </div>';
              }
          } else {
              $urlImage = url('images/' . $content->image);
              $imageDiv = '<div class="product-img">
                  <img class="rounded img img-fluid" src="'.$urlImage.'" alt="">
              </div>';
          }
        ?>
        <div class="col-md-5">
            {!! $imageDiv !!}
        </div>
        <div class="col-md-7 product-desc">
            {!! $content->description !!}
        </div>
    </div>
    <!-- div row -->
    </div>
    <!-- div container -->
</section>
<!-- end Product desc -->
<!-- gallery -->
<section class="gallery mt-3" id="image-container">
    <div class="container">
    <!-- heading -->
    <div class="row gy-2">
        @foreach($gallery as $data)
            <div class="col-md-2">
                <div class="gallery-item">
                    <img class="rounded img img-fluid" src="{{ url('images/'.$data->image) }}" alt="">
                </div>
            </div>
        @endforeach
    </div>
    <!-- row -->
    </div>
</section>
@if(!empty($sub_menu_by_type_menu))
<section class="second-nav-panel-on-view p-4" id="menu-{{ $sub_menu_by_type_menu->slug }}">
  <div class="container">
    <div class="heading mb-3">
      <h3 class="text-primary-dark fw-light">Type {{ ucwords(strtolower($sub_menu_by_type_menu->name)) }}</h3>
    </div>
      @if(isset($sub_menu_by_type_menu->view_all) && !empty($sub_menu_by_type_menu->view_all))
        <a href="{{ url('content/' . $sub_menu_by_type_menu->view_all['parent_id'] . '/' . $sub_menu_by_type_menu->view_all['slug'] . '/' . $sub_menu_by_type_menu->view_all['status']) }}" class="fw-bold mb-4 d-block">{{ $sub_menu_by_type_menu->view_all['name'] }}</a>
      @endif
      <div class="second-nav-content">
        @if($sub_menu_by_type_menu->submenu_new)
          <ul class="list" id="list-on-view">
            @foreach($sub_menu_by_type_menu->submenu_new as $subb)
              <li id="menu" data-target="sub-view-{{ $subb->slug }}" class="menu d-block">{{ $subb->name }}</li>
            @endforeach
          </ul>
        @endif
        
        @if($sub_menu_by_type_menu->submenu_new)
          @foreach($sub_menu_by_type_menu->submenu_new as $submenus)
            <div class="image-grid-container no-scrollbar d-none" id="sub-view-{{ $submenus->slug }}">
              @if($submenus->subsubmenu_new)
                @foreach($submenus->subsubmenu_new as $subsubmenus)
                  <a href="/heavy">
                    <div class="bg-white grid-item ">
                      <div class="image-container">
                        <img src="https://source.unsplash.com/random/50x50" class="img-fuild w-100" alt="...">
                      </div>
                      <p class="mb-0">{{ $subsubmenus->name }}</p>
                    </div>
                  </a>
                @endforeach
              @endif
            </div>
          @endforeach
        @endif
      </div>
  </div>
</section>
@endif
<!-- end galler -->
@endsection
@push('scripts')

<script src="{{ asset('assets/gallery/img-previewer.min.js') }}"></script>
<script>
    const a = new ImgPreviewer('#image-container', { scrollbar: true })

</script>
@endpush