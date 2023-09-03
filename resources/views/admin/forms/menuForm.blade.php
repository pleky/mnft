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
                        <form id="menu_form" method="{{ $method }}" action="{{ $url }}" enctype="multipart/form-data">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    @if($act === 'add')
                                    <select class="form-control" name="category" onchange="changeCategory(this.value)">
                                        @foreach($categories as $category)
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <input type="text" class="form-control" placeholder="Enter category" value="{{ $menu->category ?? '' }}" disabled>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Parent</label>
                                    @if($act === 'add')
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option value="">(this menu parent)</option>
                                        @foreach($menu_parent as $menus)
                                            <option value="{{ $menus->id }}">{{ $menus->name }}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <input type="text" class="form-control" placeholder="Enter parent" value="{{ $menu->parent_name ?? '' }}" disabled>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $menu->name ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Order</label>
                                    <input type="number" class="form-control" id="order" name="order" value="{{ $menu->is_order ?? '' }}" placeholder="Enter Order">
                                </div>
                                <div class="form-group">
                                    @if (isset($menu) && !empty($menu->image))
                                    <strong><p>Current Img</p></strong>
                                    <img class="rounded img img-fluid" style="max-width: 100px;" src="{{ url('images/' . $menu->image) }}" alt="">
                                    <br><br>
                                    @endif
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image">
                                </div>
                                <div class="form-group">
                                    <label class='d-block'>Status</label>
                                    <input type="radio" id="active" name="status" value="1" {{ (isset($menu->status) && $menu->status == 1) ? 'checked' : ''  }}>
                                    <label for="active">Active</label><br>
                                    <input type="radio" id="inactive" name="status" value="0" {{ (isset($menu->status) && $menu->status == 0) ? 'checked' : ''  }}>
                                    <label for="inactive">Inactive</label><br>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-info" onclick="return onSave(this)">Save</a>
                                <a href={{ url('/menu') }} class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function onSave(e){
            swal({
                title: 'Are you sure ?',
                icon: 'info'
            }).then(res => {
                if(res) {
                    $('#menu_form').submit()
                }
            })
        }

        function changeCategory(category)
        {
            $('#parent_id').empty();
            $.ajax({
                url: '/menu/get-parent-by-category/'+ category,
                type: 'GET',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    if (category == 'PRIMARY' || category == 'SECONDARY') {
                        $('#parent_id').append('<option value="">(this menu parent)</option>');
                    }
                    for (let index = 0; index < data.length; index++) {
                        const element = data[index];
                        $('#parent_id').append('<option value="'+element.id+'">'+element.name+'</option>');
                    }
                }               
            });
        }
    </script>
@endpush