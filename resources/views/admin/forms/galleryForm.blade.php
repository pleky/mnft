@extends('admin.index')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery</h1>
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
                            <h3 class="card-title">Gallery</h3>
                        </div>
                        <div class="card-body">
                            <form >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image"  placeholder="Enter name">
                                    <p><em style="font-size:13px;">*recomended image dimension 100px : 100px</em></p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <input type="text" class="form-control" id="desc" name="desc"  placeholder="Enter Description">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection