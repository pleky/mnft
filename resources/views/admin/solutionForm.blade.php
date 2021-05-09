@extends('admin.index')

@section('content')
    <section class="content">
        <h2 class="mt-4 mb-4">Edit Content</h2>
        <form method="post" action="/solutions/update/{{ $data->id }}">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" class="form-control" disabled value="{{ $data->desc_menu }}" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <textarea id="desc" name="desc" placeholder="Place some text here" rows="10">{{ $data->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary mb-2 float-right" value="Simpan">
                </div>
            </div>
        </form>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#desc').summernote({
            height: "300px",
            styleWithSpan: false
            });
        }); 
    </script>
@endpush