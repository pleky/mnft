@extends('admin.index')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
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
                            <h3 class="card-title">Profile</h3>
                        </div>
                        <div class="card-body">
                            <form method="{{ $method }}" action="{{ $url }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" value="{{ $profile->id }}"></input>
                                <div class="form-group">
                                    <label for="name">Company Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $profile->company_name }}" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ $profile->description }}" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Address</label>
                                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address">{{ $profile->address }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{ $profile->phone }}" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email }}" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" id="website" name="website" value="{{ $profile->website }}" placeholder="Enter Website URL">
                                </div>
                                <div class="form-group">
                                    <label for="address">Instagram</label>
                                    <textarea type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter Instagram">{{ $profile->instagram }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="address">Youtube</label>
                                    <textarea type="text" class="form-control" id="youtube" name="youtube" value="" placeholder="Enter Youtube">{{ $profile->youtube }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="address">Facebook</label>
                                    <textarea type="text" class="form-control" id="Facebook" name="facebook" placeholder="Enter Facebook">{{ $profile->facebook }}</textarea>
                                </div>

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