@extends('template.index')

@section('content')
<!-- Porduct desc -->
<section class="product mt-3 mt-lg-5 pt-lg-5">
    <div class="container">
      <div class="heading">
          <h3 class="text-primary-dark">About PT Raja Teknik Aditama (RTA)</h3>
      </div>

      <div class="row">
          <div class="col-md-8 product-desc">
              <p>{{ $about->name }}</p>

              <h5 class="text-primary-dark">What We offer?</h5>
              {!! $about->description !!}

              <!-- <h5 class="text-primary-dark">Why RTA?</h5>
              <ul>
                  <li>Experienced technical team</li>
                  <li>Flexible custom precision parts</li>
                  <li>Innovative engineering design and solutions</li>
                  <li>Various material available</li>
                  <li>Problem solving objective</li>
              </ul> -->
          </div>
          <div class="col-md-4">
              <div class="product-img">
                  <img class="rounded h-100 w-100" src="{{ url('images/about/'.$about->image) }}" alt="">
              </div>
          </div>
      </div>
      <!-- div row -->
    </div>
    <!-- div container -->
</section>
<!-- end Product desc -->

<!-- why rta -->
<section class='why-rta container-fluid p-0 mt-5'>
    <div class="title p-2">
        <h4 class="text-center text-white">Why RTA</h4>
    </div>


    <div class="row container mx-auto mt-3">
        <div class="col-md-4 mb-3 d-flex justify-content-center align-items-center flex-column">
            <div class="why-rta-items d-flex align-items-center justify-content-center">
                <img src="{{ url('images/about/'.$why[0]->image) }}" width="150" height="150"/>
            </div>
            <p class="desc">{{ $why[0]->title }}</p>
        </div>
        <div class="col-md-4  mb-3  d-flex justify-content-center align-items-center  flex-column">
        <div class="why-rta-items d-flex align-items-center justify-content-center">
                <img src="{{ url('images/about/'.$why[1]->image) }}" width="150" height="150"/>
            </div>
            <p class="desc">{{ $why[1]->title }}</p>
        </div>
        <div class="col-md-4  mb-3  d-flex justify-content-center align-items-center  flex-column">
            <div class="why-rta-items d-flex align-items-center justify-content-center">
                <img src="{{ url('images/about/'.$why[2]->image) }}" width="150" height="150"/>
            </div>
            <p class="desc">{{ $why[2]->title }}</p>
        </div>
        <div class="col-md-6 mt-5 d-flex justify-content-center align-items-center  flex-column">
        <div class="why-rta-items d-flex align-items-center justify-content-center">
                <img src="{{ url('images/about/'.$why[3]->image) }}" width="150" height="150"/>
            </div>
            <p class="desc">{{ $why[3]->title }}</p>
        </div>
        <div class="col-md-6 mt-5 d-flex justify-content-center align-items-center  flex-column">
        <div class="why-rta-items d-flex align-items-center justify-content-center">
                <img src="{{ url('images/about/'.$why[4]->image) }}" width="150" height="150"/>
            </div>
            <p class="desc">{{ $why[4]->title }}</p>
        </div>
    </div>
</section>
<!-- end why rta -->

<!-- company vision -->
<section class="company-vision mt-5 p-3">
  <div class="container">
      <h4 class="text-center text-white pb-0 mb-0">Our Vision</h4>
      <h3 class="text-center fw-light  text-white vision-text">To be the leading company in custom engineering and precision parts</h3>
  </div>
</section>
<!-- end company vision -->
<!-- mision -->
<section class="mision">
    <div class="container">
      <div class="heading">
          <h4 class="text-primary-dark text-center fw-light">Our Mission</h4>
      </div>
      <!-- heading -->

      <div class="row align-items-center">
          <div class="col-md-12">
              {!! $about->mission !!}
          </div>
      </div>
    </div>
</section>
<!-- end mission -->

<!-- core value -->
<section class="core-value mt-3 mb-5">
    <div class="container">
        <div class="heading">
            <h4 class="text-primary-dark fw-light">Core Value</h4>
        </div>
        <div class="row">
            <div class="col">
                <div class="core-value-item position-relative" id='core-value-item'>
                    <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/200x50?trust" alt="">
                    <span class="text-white text-wrapper">{{ $core[0]->title }}</span>
                </div>
            </div>
            <div class="col">
              <div class="core-value-item position-relative" id='core-value-item'>
                  <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/200x50?improvement" alt="">
                  <span class="text-white text-wrapper">{{ $core[1]->title }}</span>
              </div>
          </div>
          <div class="col">
              <div class="core-value-item position-relative" id='core-value-item'>
                  <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/200x50?mindset" alt="">
                  <span class="text-white text-wrapper">{{ $core[2]->title }}</span>
              </div>
          </div>
          <div class="col">
              <div class="core-value-item position-relative" id='core-value-item'>
                  <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/200x50?sustainable" alt="">
                  <span class="text-white text-wrapper">{{ $core[3]->title }}</span>
              </div>
          </div>
          <div class="col">
              <div class="core-value-item position-relative" id='core-value-item'>
                  <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/200x50">
                  <span class="text-white text-wrapper">{{ $core[4]->title }}</span>
              </div>
          </div>
        </div>
    </div>
</section>
<!-- end core value -->
@endsection