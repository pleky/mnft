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
                            <h3 class="card-title">Add Gallery</h3>
                        </div>
                        <div class="card-body">
                            <form role='form'>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="description">Title</label>
                                    <input type="text" class="form-control" id="description" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label>Select Content</label>
                                    <select class="form-control">
                                    <option>Content 1</option>
                                    <option>Content 2</option>
                                    <option>Content 3</option>
                                    <option>Content 4</option>
                                    <option>Content 5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo" placeholder="Enter slug">
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