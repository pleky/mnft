@extends('admin.index')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>About</h1>
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
                            <h3 class="card-title">About</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" value=""></input>

                                <div class="form-group">
                                    <textarea rows="5" type="text" class="form-control" id="description" name="description" placeholder="Enter name"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Image</label>
                                    <input type="file" class="form-control" id="description" name="description" placeholder="Enter name">
                                    <p><em style="font-size:13px;">*recomended image dimension 350px : 350px</em></p>
                                </div>
                                <div class="form-group">
                                    <label for="address">What We offer?</label>
                                    <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                                </div>

                                <fieldset>
                                    <legend>Why Rta</legend>
                                    <div class="form-group">
                                        <input type="file" class="form-control mb-1" id="website" name="website" value="">
                                        <p><em style="font-size:13px;">*recomended image dimension 150px : 150px</em></p>
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control mb-1" id="website" name="website" value="">
                                        <p><em style="font-size:13px;">*recomended image dimension 150px : 150px</em></p>
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control mb-1" id="website" name="website" value="">
                                        <p><em style="font-size:13px;">*recomended image dimension 150px : 150px</em></p>
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control mb-1" id="website" name="website" value="">
                                        <p><em style="font-size:13px;">*recomended image dimension 150px : 150px</em></p>
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control mb-1" id="website" name="website" value="">
                                        <p><em style="font-size:13px;">*recomended image dimension 150px : 150px</em></p>
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                </fieldset>

                                <div class="form-group">
                                    <label for="address">Mission</label>
                                    <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                                </div>

                                <fieldset>
                                    <legend>Core Value</legend>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="website" name="website" value="" placeholder="Description">
                                    </div>
                                </fieldset>

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

@push('scripts')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endpush

