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
              <p>PT Raja Teknik Aditama (RTA) specializes in design, engineering and manufacture custom precision parts.</p>

              <p>We provide technical consultancy for re-engineering/re-manufacture of custom precision parts to enhance the part performance and lifetime.</p>

              <h5 class="text-primary-dark">What We offer?</h5>
              <ul>
                  <li>Technical consultancy </li>
                  <li>Parts identification and testing.</li>
                  <li>Engineering design</li>
                  <li>Contract manufacture for custom precision parts</li>
                  <li>Trading for mechanical components & engineering tools.</li>
              </ul>

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
                  <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/350x350" alt="">
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
                <img src="{{ asset('assets/images/1.png') }}" width="150" height="150"/>
            </div>
            <p class="desc">Experienced technical team</p>
        </div>
        <div class="col-md-4  mb-3  d-flex justify-content-center align-items-center  flex-column">
        <div class="why-rta-items d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/2.png') }}" width="150" height="150"/>
            </div>
            <p class="desc">Flexible custom precision parts</p>
        </div>
        <div class="col-md-4  mb-3  d-flex justify-content-center align-items-center  flex-column">
            <div class="why-rta-items d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/3.png') }}" width="150" height="150"/>
            </div>
            <p class="desc">Innovative engineering design and solutions</p>
        </div>
        <div class="col-md-6 mt-5 d-flex justify-content-center align-items-center  flex-column">
        <div class="why-rta-items d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/4.png') }}" width="150" height="150"/>
            </div>
            <p class="desc">Contract manufacture for custom precision parts</p>
        </div>
        <div class="col-md-6 mt-5 d-flex justify-content-center align-items-center  flex-column">
        <div class="why-rta-items d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/5.png') }}" width="150" height="150"/>
            </div>
            <p class="desc">Trading for mechanical components & engineering tools.</p>
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
              <ul>
                  <li>Helping people by achieving the machine/equipment part performance</li>
                  <li>Continuously increasing the business efficiency and effectiveness</li>
                  <li>Continuous improvement and continuous learning.</li>
                  <li>Continuously providing the  value added products and services</li>
                  <li>Continuously perform sustainable growth and solid financial structure</li>
              </ul>
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
                    <span class="text-white text-wrapper">Trust & Integrity </span>
                </div>
            </div>
            <div class="col">
              <div class="core-value-item position-relative" id='core-value-item'>
                  <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/200x50?improvement" alt="">
                  <span class="text-white text-wrapper">Continous improvement</span>
              </div>
          </div>
          <div class="col">
              <div class="core-value-item position-relative" id='core-value-item'>
                  <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/200x50?mindset" alt="">
                  <span class="text-white text-wrapper">Problem solving mindset</span>
              </div>
          </div>
          <div class="col">
              <div class="core-value-item position-relative" id='core-value-item'>
                  <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/200x50?sustainable" alt="">
                  <span class="text-white text-wrapper">Sustainable</span>
              </div>
          </div>
          <div class="col">
              <div class="core-value-item position-relative" id='core-value-item'>
                  <img class="rounded h-100 w-100" src="https://source.unsplash.com/random/200x50">
                  <span class="text-white text-wrapper">Innovative</span>
              </div>
          </div>
        </div>
    </div>
</section>
<!-- end core value -->
@endsection