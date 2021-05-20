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
                            {!! Form::open(['route'=>['contents.add'], 'method'=>'post', 'id'=>"contents"]) !!}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for='menuId'>Select Menu</label>
                                    {{ Form::mySelect('menuId', ['1'=>'Menu 1','2'=>'Menu 2'], null, ['id'=>'menuId', 'placeholder'=>'Select Menu', 'class'=>'form-control']) }}
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
                                </div>
                                <div class="form-group">
                                    <button class='btn btn-info' type="button" id="btnAddGallery">Add Gallery</button>
                                </div>
                                {!! Form::close() !!}
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

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const templateToAdd = "<fieldset class='form-group border p-3'>\
                                    <legend class='w-auto px-2'>\
                                        Gallery\
                                    </legend>\
                                    <div>\
                                        <div class='form-group'>\
                                            <label for='galleryTitle'>Title</label>\
                                            <input class='form-control' id='galleryTitle' type='text'>\
                                        </div>\
                                        <div class='form-group'>\
                                            <label for='galleryImage'>Image</label>\
                                            <input class='form-control' id='galleryImage' type='file'>\
                                        </div>\
                                    </div>\
                                </fieldset>";
        const container = document.getElementById("form-container");
        const galleryContainer = document.getElementById("galleryContainer");
        const btnAddGallery = document.getElementById('btnAddGallery');
        btnAddGallery.addEventListener('click', function() {
            console.log('jancok')
            galleryContainer.insertAdjacentHTML('beforeend', templateToAdd);
        })
    });
</script>