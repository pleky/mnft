@extends('template.index')

  @section('content')
    <!-- breadcrumb -->
    <section class="container-fluid bc">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><img alt="home" src='./home.png' class="bc-home" /></a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
    </section>
    <!-- end breadcrumb -->

    <!-- our speciality -->
    <section class="container-fluid bc mt-4">
        <div class="heading">
            <h3 class="text-primary-dark fw-light">Heavy Equipment Parts</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img alt="test" src="https://source.unsplash.com/random/500x250" class="img-fluid w-100" />
            </div>
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea ut eos sit necessitatibus quos rem veniam
                    odio natus, ducimus eveniet officiis magnam, cupiditate numquam sed aut. Magnam inventore modi vero.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem distinctio reprehenderit, porro
                    ducimus, provident quis nihil blanditiis eligendi quas consequatur aliquam ipsam tempora, eaque
                    veniam beatae corporis dolorum at voluptatum?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique rem, doloremque perspiciatis
                    suscipit commodi quod provident, obcaecati consequuntur veritatis tempore architecto impedit
                    laudantium illo distinctio, aliquam accusantium fuga explicabo praesentium.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor consequatur dignissimos
                    exercitationem debitis, ad placeat numquam modi asperiores optio nulla fuga? Perspiciatis sint,
                    officiis ab ut assumenda dolore qui libero.
                </p>
            </div>
        </div>
    </section>
    <!-- end our speciality -->

    <!-- partners -->
    <section class="container-fluid bc mt-4">
      <div class="row gap-2">
        <div class="col-md">
            <img src="https://source.unsplash.com/random/200x70" class="img-fluid" alt="">
        </div>
        <div class="col-md">
            <img src="https://source.unsplash.com/random/200x70" class="img-fluid" alt="">
        </div>
        <div class="col-md">
            <img src="https://source.unsplash.com/random/200x70" class="img-fluid" alt="">
        </div>
        <div class="col-md">
            <img src="https://source.unsplash.com/random/200x70" class="img-fluid" alt="">
        </div>
        <div class="col-md">
            <img src="https://source.unsplash.com/random/200x70" class="img-fluid" alt="">
        </div>
        <div class="col-md">
            <img src="https://source.unsplash.com/random/200x70" class="img-fluid" alt="">
        </div>
        <div class="col-md">
            <img src="https://source.unsplash.com/random/200x70" class="img-fluid" alt="">
        </div>
        <div class="col-md">
            <img src="https://source.unsplash.com/random/200x70" class="img-fluid" alt="">
        </div>
      </div>
    </section>
    <!-- end partners -->



    <!-- Project References -->
    <section class="bg-dark-secondary p-4 mt-4">
        <div class="container-fluid bc">
            <div class="heading">
                <h3 class="text-primary-dark fw-light">Type Heavy equipments parts</h3>
            </div>

            <div class="typeofpart p-4">
                <div class="container-fluid bc">
                    <a href="#" class="fw-bold mb-4 d-block">View All Heavy Equipment Parts</a>
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list">
                                <li id="menu" class="menu">Industrial Belts</li>
                                <li id="menu" class="menu">Industrial Belts</li>
                                <li id="menu" class="menu">Industrial Belts</li>
                                <li id="menu" class="menu">Industrial Belts</li>
                                <li id="menu" class="menu">Industrial Belts</li>
                            </ul>
                        </div>
                        <div class="col">
                            <div class="row gap-4">
                                <div class="col-md-3">
                                    <div class="bg-white">
                                        <img src="https://source.unsplash.com/random/120x120" class="img-fuild w-100"
                                            alt="...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-white">
                                        <img src="https://source.unsplash.com/random/120x120" class="img-fuild w-100"
                                            alt="...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-white">
                                        <img src="https://source.unsplash.com/random/120x120" class="img-fuild w-100"
                                            alt="...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-white">
                                        <img src="https://source.unsplash.com/random/120x120" class="img-fuild w-100"
                                            alt="...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-white">
                                        <img src="https://source.unsplash.com/random/120x120" class="img-fuild w-100"
                                            alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Project References -->
    @endsection