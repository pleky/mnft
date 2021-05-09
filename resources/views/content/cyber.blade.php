@extends('template.index')

@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="inner-heading">
                    <ul class="breadcrumb">
                    <li><a href="/">Home</a> <i class="icon-angle-right"></i></li>
                    <li class="active">IT Security</li>
                    </ul>
                    <h2>IT Security</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                {!! $data->description !!}
            </div>
        </div>
    </div>
</section>
@endsection