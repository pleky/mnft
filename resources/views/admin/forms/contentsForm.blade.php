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
                            <h3 class="card-title">Add Content</h3>
                        </div>
                        <div class="card-body" id='form-container'>
                            <form method="{{ $method }}" action="{{ $url }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for='menuId'>Select Menu</label>
                                    <select class="form-control" name="menu">
                                        @foreach($menu as $menus)
                                            <option value="{{ $menus->id }}" {{ (isset($menu->parent_id) && $menu->parent_id == $menus->id) ? 'selected' : ''  }} >{{ $menus->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    {!! Form::myInput('file', 'image', null, ['id'=>'image', 'class' =>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    {!! Form::myTextarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
                                </div>
                                <div id='galleryContainer'>
                                    <div class="form-group">
                                        <button class='btn btn-info' type="button" id="btnAddGallery">Add Gallery</button>
                                    </div>
                                    <!-- <fieldset class='form-group border p-3'>
                                        <legend class='w-auto px-2'>
                                            Gallery
                                        </legend>
                                            <div class='form-group'>
                                                <label for='galleryTitle'>Title</label>
                                                <input class='form-control' id='galleryTitle' type='text'>
                                            </div>
                                            <div class='form-group'>
                                                <label for='galleryImage'>Image</label>
                                                <input class='form-control' id='galleryImage' type='file'>
                                            </div>
                                        <a class='btn btn-danger text-white' id='btn-remove'>Remove</a>
                                    </fieldset> -->
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

<script src="{{ asset('assets/js/index.js') }}"></script>