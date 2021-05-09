@extends('template.index')

@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="inner-heading">
                    <ul class="breadcrumb">
                    <li><a href="/">Home</a> <i class="icon-angle-right"></i></li>
                    <li class="active">Wireless Solutions</li>
                    </ul>
                    <h2>Wireless Solutions</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                <p>{!! $data->description !!}</p>
            </div>
        </div>
    </div>
</section>
@endsection