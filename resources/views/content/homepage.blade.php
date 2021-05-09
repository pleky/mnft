@extends('template.index')

@section('content')
<section id="featured">
    <!-- slideshow start here -->
    <div class="camera_wrap" id="camera-slide">
        <!-- slide 1 here -->
        <div data-src="{{ asset("/dist/img/slides/cloud.jpg")}}">
            <div class="camera_caption fadeFromLeft">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <h2 class="animated fadeInDown" style="color: #888;">
                                <strong>Solution For the Future of <span class="colored">Your Company</span></strong>
                            </h2>
                            <p class="animated fadeInUp" style="color:#fff;">
                                Complete information technology services for the efficiency and productivity of your company.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- slide 2 here -->
        <div data-src="{{ asset("/dist/img/slides/server.jpg")}}">
            <div class="camera_caption fadeFromLeft">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <h2 class="animated fadeInDown" style="color: #888;">
                                <strong>Solutions for your 
                                    <span class="colored">Server and Storage</span>
                                    performance
                                </strong>
                            </h2>
                            <p class="animated fadeInUp" style="color:#fff;">
                                In this digital transformation era, every business develops faster and dynamically. 
                                You need an investment in infrastructure that will support your business needs for 
                                today and for the future
                            </p>
                            <div class="input-append">
                                <a href="{{ url('/mensolutions/server') }}" class="btn btn-theme btn-large animated fadeInUp">
                                    See More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- slide 3 here -->
        <div data-src="{{ asset("/dist/img/slides/cybersecurity.jpg")}}">
            <div class="camera_caption fadeFromLeft">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <h2 class="animated fadeInDown" style="color: #888;">
                                <strong>
                                    <span class="colored">Responsive</span> 
                                    and <span class="colored">cross broswer</span> 
                                    compatibility
                                </strong>
                            </h2>
                            <p class="animated fadeInUp" style="color:#fff;">
                                In this digital transformation era, every business develops faster and dynamically. 
                                You need an investment in infrastructure that will support your business needs for 
                                today and for the future
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- slideshow end here -->
</section>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="span3">
                <a href="{{ url('/mensolutions/wireless') }}" style="text-decoration: none; color: inherit;">
                    <div class="service-box aligncenter flyLeft">
                        <div class="icon">
                            <i class="icon-circled icon-bgprimary icon-rss icon-4x"></i>
                        </div>
                        <h5 class="title-product">Wireless <span class="colored">Solutions</span></h5>
                        <!-- <p>Infrastruktur Jaringan yang baik akan memberikan kenyamanan dalam bekerja.</p> -->
                    </div>
                </a>
            </div>
            <div class="span3">
                <a href="{{ url('/mensolutions/cyber') }}" style="text-decoration: none; color: inherit;">
                    <div class="service-box aligncenter flyIn">
                        <div class="icon">
                            <i class="icon-circled icon-bgsuccess icon-shield icon-4x"></i>
                        </div>
                        <h5 class="title-product">IT Security</h5>
                        <!-- <p>Keamanan komputer atau dikenal juga dengan sebutan cybersecurity atau IT security.</p> -->
                    </div>
                </a>
            </div>
            <div class="span3">
                <a href="{{ url('/mensolutions/server') }}" style="text-decoration: none; color: inherit;">
                    <div class="service-box aligncenter flyIn">
                        <div class="icon">
                            <i class="icon-circled icon-bgdanger icon-hdd icon-4x"></i>
                        </div>
                        <h5 class="title-product">Server <span class="colored">Storage</span></h5>
                        <!-- <p>Hardware yang baik akan memberikan kenyamanan dalam bekerja.</p> -->
                    </div>
                </a>
            </div>
            <div class="span3">
                <a href="{{ url('/mensolutions/virtual') }}" style="text-decoration: none; color: inherit;">
                    <div class="service-box aligncenter flyRight">
                        <div class="icon">
                            <i class="icon-circled icon-bgwarning icon-cloud icon-4x"></i>
                        </div>
                        <h5 class="title-product">Virtualization <span class="colored">and Cloud</span></h5>
                        <!-- <p>Sebuah teknik untuk menyembunyikan karakteristik fisik dari sumber daya komputer.</p> -->
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="second">
                <div class="span3">
                    <a href="{{ url('/mensolutions/wired') }}" style="text-decoration: none; color: inherit;">
                        <div class="service-box aligncenter flyLeft">
                            <div class="icon">
                                <i class="icon-circled icon-bgprimary icon-code-fork icon-4x"></i>
                            </div>
                            <h5 class="title-product">Wired <span class="colored">Solutions</span></h5>
                            <!-- <p>Hardware yang baik akan memberikan kenyamanan dalam bekerja.</p> -->
                        </div>
                    </a>
                </div>
                <div class="span3">
                    <a href="{{ url('/mensolutions/unified') }}" style="text-decoration: none; color: inherit;">
                        <div class="service-box aligncenter flyin">
                            <div class="icon">
                                <i class="icon-circled icon-bgsuccess icon-globe icon-4x"></i>
                            </div>
                            <h5 class="title-product">Unified <span class="colored">Communications</span></h5>
                            <!-- <p>Salah satu terobosan yang manggabungkan layanan telepon dengan komputer.</p> -->
                        </div>
                    </a>
                </div>
                <div class="span3">
                    <a href="{{ url('/mensolutions/webdesign') }}" style="text-decoration: none; color: inherit;">
                        <div class="service-box aligncenter flyRight">
                            <div class="icon">
                                <i class="icon-circled icon-bgdanger icon-laptop icon-4x"></i>
                            </div>
                            <h5 class="title-product">Web <span class="colored">Design</span></h5>
                            <!-- <p>Bangun identitas bisnis dan usaha anda di dunia Internet melalui Website.</p> -->
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="span12">
            <div class="solidline"></div>
          </div>
        </div>
        <div class="row">
            <div class="span12 aligncenter">
                <h3 class="title">Success Story</h3>
                <div class="blankline30"></div>
                <div class="aligncenter">
                    <img src="{{ asset("/dist/img/story/logoedii.png")}}" style="width: auto;height: 60px; margin: 10px;"/>
                    <img src="{{ asset("/dist/img/story/logo_2.png")}}" style="width: auto;height: 60px; margin: 10px;"/>
                    <img src="{{ asset("/dist/img/story/cybertrend.png")}}" style="width: auto;height: 60px; margin: 10px;"/>
                    <img src="{{ asset("/dist/img/story/yakjin.jpg")}}" style="width: auto;height: 60px; margin: 10px;"/>
                    <span style="
                        font-size: 20px;
                        font-weight: bold;
                        color: black;
                    ">PT Pasific Logistic</span>
                    <img src="{{ asset("/dist/img/story/FLTechnics.jpg")}}" style="width: auto;height: 60px; margin: 10px;"/>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection