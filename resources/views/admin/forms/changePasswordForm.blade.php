@extends('admin.index')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
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
                            <h3 class="card-title"> &nbsp; </h3>
                        </div>
                        <div class="card-body">
                            <form id="pass_form" method="POST" action="{{ route('change.password') }}">
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ Session::get('id') }}">
                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter Current Password">{{ $about->name ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">{{ $about->name ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password" placeholder="Enter Confrim Password">{{ $about->name ?? '' }}</textarea>
                                </div>
                               
                                <div class="card-footer">
                                    <a onclick="onSave()" type="submit" class="btn btn-info text-white" style="cursor: pointer;">Update</a>
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

    function onSave(){
            swal({
                title: 'Are you sure ?',
                icon: 'info'
            }).then(res => {
                if(res) {
                    $('#pass_form').submit()
                }
            })
        }
</script>
@endpush

