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
                            <h3 class="card-title">Add Menu</h3>
                        </div>
                        <form method="{{ $method }}" action="{{ $url }}">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Type</label>
                                    <select class="form-control" name="type">
                                        <option value="industry">Industry</option>
                                        <option value="product">Product</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class='d-block'>Status</label>
                                    <input type="radio" id="active" name="status" value="1">
                                    <label for="active">Active</label><br>
                                    <input type="radio" id="inactive" name="status" value="0">
                                    <label for="inactive">Inactive</label><br>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection