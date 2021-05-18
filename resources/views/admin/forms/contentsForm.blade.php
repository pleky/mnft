@extends('admin.index')

@section('content')
    <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Content</h1>
          </div>
        </div>
      </div>
    </section> -->


    <section class="content mt-3">
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
                                    <label>Select Menu</label>
                                    <select class="form-control">
                                    <option>Menu 1</option>
                                    <option>Menu 2</option>
                                    <option>Menu 3</option>
                                    <option>Menu 4</option>
                                    <option>Menu 5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" placeholder="Enter slug">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" id="description" placeholder="Enter slug"> </textarea>
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