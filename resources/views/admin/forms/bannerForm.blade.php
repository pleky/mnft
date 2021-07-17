@extends('admin.index')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Data</h1>
          </div>
        </div>
      </div>
    </section>


    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add Banner</h3>
                        </div>
                        <div class="card-body">
                            <form id="banner_form" method="{{ $method }}" action="{{ $url }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $banner->title ?? '' }}" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" id="description" name="description">{{ $banner->description ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image">
                                    <p><em style="font-size:13px;">*recomended image dimension 1500px : 500px</em></p>
                                    @if(isset($banner->image) && $banner->image)
                                        <p style="font-size: 11px;font-style: italic;">leave blank if you do not wish to change the logo</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Order</label>
                                    <input type="text" class="form-control" id="order" name="order" value="{{ $banner->is_order ?? '' }}" placeholder="Enter Order">
                                </div>
                                <div class="form-group">
                                    <span class='d-block'>Status</span>
                                    <input type="radio" id="active" name="status" value="1" {{ (isset($banner->status) && $banner->status == 1) ? 'checked' : ''  }}>
                                    <label for="active">Active</label><br>
                                    <input type="radio" id="inactive" name="status" value="0" {{ (isset($banner->status) && $banner->status == 0) ? 'checked' : ''  }}>
                                    <label for="inactive">Inactive</label><br>
                                </div>
                                <div class="card-footer">
                                    <a onclick="onSave()" class="btn btn-info text-white" style="cursor: pointer;">Save</a>
                                    <a href={{ url('/banner') }} class="btn btn-warning text-white">Back</a>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function onSave(){
            swal({
                title: 'Are you sure ?',
                icon: 'info'
            }).then(res => {
                if(res) {
                    $('#banner_form').submit()
                }
            })
        }
    </script>
@endpush