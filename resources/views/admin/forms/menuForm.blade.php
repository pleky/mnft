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
                        <form id="menu_form" method="{{ $method }}" action="{{ $url }}">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $menu->name ?? '' }}">
                                </div>
                                @if($act == 'add' || $menu->parent_id)
                                <div class="form-group">
                                    <label for="name">Type</label>
                                    <select class="form-control" name="type">
                                        @foreach($menu_parent as $menus)
                                            <option value="{{ $menus->id }}" {{ (isset($menu->parent_id) && $menu->parent_id == $menus->id) ? 'selected' : ''  }} >{{ $menus->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Order</label>
                                    <input type="text" class="form-control" id="order" name="order" value="{{ $menu->is_order ?? '' }}" placeholder="Enter Order">
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
    </script>
@endpush