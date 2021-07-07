@extends('admin.index')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>About</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">About</h3>
                        </div>
                        <div class="card-body">
                            <form method="{{ $method }}" action="{{ $url }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" value="{{ $about->id ?? '' }}"></input>

                                <div class="form-group">
                                    <textarea rows="5" type="text" class="form-control" id="name" name="name" placeholder="Enter name">{{ $about->name ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Image</label>
                                    <input type="file" class="form-control" id="" name="image" placeholder="Enter name">
                                    <p><em style="font-size:13px;">*recomended image dimension 350px : 350px</em></p>
                                    @if(isset($about->image) && $about->image)
                                        <p style="font-size: 11px;font-style: italic;">leave blank if you do not wish to change the logo</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="address">What We offer?</label>
                                    <textarea class="ckeditor form-control" name="description">{{ $about->description }}</textarea>
                                </div>

                                <fieldset>
                                    <legend>Why Rta</legend>
                                    @foreach($why as $whys)
                                        <div class="form-group">
                                            <input type="file" class="form-control mb-1" id="whyImage" name="whyImage[]" value="">
                                            <p><em style="font-size:13px;">*recomended image dimension 150px : 150px</em></p>
                                            @if(isset($whys->image) && $whys->image)
                                                <p style="font-size: 11px;font-style: italic;">leave blank if you do not wish to change the logo</p>
                                            @endif
                                            <input type="text" class="form-control" id="whyTitle" name="whyTitle[]" value="{{ $whys->title ?? '' }}" placeholder="Description">
                                            <input type="hidden" id="id" name="whyId[]" value="{{ $whys->id ?? '' }}"></input>
                                        </div>
                                    @endforeach
                                </fieldset>

                                <div class="form-group">
                                    <label for="address">Mission</label>
                                    <textarea class="ckeditor form-control" name="mission">{{ $about->mission }}</textarea>
                                </div>

                                <fieldset>
                                    <legend>Core Value</legend>
                                    @foreach($core as $cores)
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="core" name="coreTitle[]" value="{{ $cores->title ?? '' }}" placeholder="Description">
                                            <input type="hidden" id="id" name="coreId[]" value="{{ $cores->id ?? '' }}"></input>
                                        </div>
                                    @endforeach
                                </fieldset>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endpush

