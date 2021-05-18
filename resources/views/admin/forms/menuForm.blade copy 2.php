@extends('admin.index')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Content</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add Menu</h3>
                        </div>
                        <div class="card-body">
                            <form role='form'>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Slug</label>
                                    <input type="text" class="form-control" id="slug" placeholder="Enter slug">
                                </div>
                                <div class="form-group">
                                    <span class='d-block'>Status</span>
                                    <input type="radio" id="active" name="gender" value="active">
                                    <label for="active">Active</label><br>
                                    <input type="radio" id="inactive" name="gender" value="inactive">
                                    <label for="inactive">Inactive</label><br>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection