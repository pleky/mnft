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
                            <form id='content_form' method="{{ $method }}" action="{{ $url }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for='menuId'>Select Menu</label>
                                    @if($act == 'add')
                                    <select class="form-control" name="menu">
                                        @foreach($menu as $menus)
                                            <option value="{{ $menus['id'] }}">{{ $menus['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <input type="text" class="form-control" value="{{ $contents->name }}" readonly>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class='btn btn-info' type="button" id="btnAddImage">Add Image</button>
                                </div>
                                <div class="form-group" id="input-image-div">
                                    <label for="image">Image</label>
                                    @php 
                                        $image = json_decode($contents->image, true); 
                                    @endphp
                                    @if(is_array($image))
                                        @foreach($image as $img)
                                        <span class="image-input">
                                            <strong><p>Current Img</p></strong>
                                            <img class="rounded img img-fluid" style="max-width: 100px;" src="{{ url('images/' . $img) }}" alt="">
                                            <input type="file" class="form-control" id="image" name="image[]" placeholder="Enter Image">
                                            <p style="margin-bottom: 0px !important;"><em style="font-size:13px;">*recomended image dimension 350px : 350px</em></p>
                                            <p style="font-size: 11px;font-style: italic;">leave blank if you do not wish to change the logo</p>
                                        </span>    
                                        @endforeach
                                    @else
                                    @endif

                                    @if(isset($contents))
                                    <strong><p>Add New Img</p></strong>
                                    @endif
                                    <span class="image-input" id="image-input-id">
                                        <input type="file" class="form-control" id="image" name="image[]" placeholder="Enter Image">
                                        <p><em style="font-size:13px;">*recomended image dimension 350px : 350px</em></p>
                                        <!-- @if(isset($contents->image) && $contents->image)
                                            <p style="font-size: 11px;font-style: italic;">leave blank if you do not wish to change the logo</p>
                                        @endif -->
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="address">Descriptions</label>
                                    <textarea class="ckeditor form-control" name="description">{{ $contents->description ?? '' }}</textarea>
                                </div>
                                <div id ="galleryContainer">
                                    <div class="form-group">
                                        <button class='btn btn-info' type="button" id="btnAddGallery">Add Gallery</button>
                                    </div>
                                    @if($act == 'edit' && $gallery)
                                        @for($i=0; $i < count($gallery); $i++)
                                        <fieldset id="fieldset" class="form-group border p-3">
                                            <legend class="w-auto px-2">Gallery</legend>
                                            <div class="form-group">
                                                <label for="galleryOrder">Order</label>
                                                <input type="number" class="form-control" id="galleryOrder" name="galleryOrder[{{ $i }}]" value="{{ $gallery[$i]['is_order'] ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="galleryImage">Image</label>
                                                <input type="file" class="form-control" id="galleryImage" name="galleryImage[{{ $i }}]">
                                                <input type="hidden" name="galleryID[{{ $i }}]" value="{{ $gallery[$i]['id'] ?? 0 }}">
                                                <p><em style="font-size:13px;">*recomended image dimension 350px : 350px</em></p>
                                                @if(isset($gallery[$i]['image']) && $gallery[$i]['image'])
                                                    <p style="font-size: 11px;font-style: italic;">leave blank if you do not wish to change the logo</p>
                                                @endif
                                            </div>
                                            <button onclick="removeGallery(this, {{ $gallery[$i]['id'] ?? 0 }})" class="btn btn-danger" type="button">Remove</button>
                                        </fieldset>
                                        @endfor
                                    @endif
                                </div>  
                                <div class="card-footer">
                                    <a onclick='onSave()' type="submit" class="btn btn-info text-white mr-2" style="cursor: pointer;">Save</button>
                                    <a href={{ url('/contents') }} class="btn btn-warning text-white">Back</a>
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script>

        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });

        const removeElement = (e, id) => {
            const galleryContainer = document.getElementById("galleryContainer");

            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if(willDelete) {
                    galleryContainer.removeChild(e);
                    $.ajax({
                        url: '/contents/delete/gallery/'+ id,
                        type: 'GET',
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(msg) {
                            swal({
                            title: "Sukses",
                            text: "Data Anda Berhasil Dihapus",
                            icon: "success",
                            }).then((r) => {
                                window.location.reload()
                            })
                        }               
                    });
                }
            })
        };

        function removeGallery(e, id){
            const field = document.getElementById("fieldset")
            removeElement(field, id)
        }

        function onSave(){
            swal({
                title: 'Are you sure ?',
                icon: 'info'
            }).then(res => {
                if(res) {
                    $('#content_form').submit()
                }
            })
        }
    </script>
@endpush