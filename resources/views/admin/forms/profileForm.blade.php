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
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $profile->phone }}" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" class="form-control" id="fax" name="fax" value="{{ $profile->fax }}" placeholder="Enter Fax">
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
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter Instagram" value="{{ $profile->instagram }}">
                                </div>
                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Enter Youtube" value="{{ $profile->youtube }}">
                                </div>
                                <div class="form-group">
                                    <label for="Facebook">Facebook</label>
                                    <input type="text" class="form-control" id="Facebook" name="Facebook" placeholder="Enter Facebook" value="{{ $profile->facebook }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="5" type="text" class="form-control" id="description" name="description" placeholder="Enter name">{{ $profile->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="address">address</label>
                                    <textarea rows="5" class="form-control" id="address" name="address" placeholder="Enter Address">{{ $profile->address }}</textarea>
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