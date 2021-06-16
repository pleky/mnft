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
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $menu->name ?? '' }}">
                                </div>
                                @if($menu->parent_id)
                                <div class="form-group">
                                    <label for="name">Type</label>
                                    <select class="form-control" name="type">
                                        @foreach($menu_parent as $menus)
                                            <option value="{{ $menus->id }}" {{ ($menu->parent_id == $menus->id) ? 'selected' : ''  }} >{{ $menus->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Order</label>
                                    <input type="text" class="form-control" id="order" name="order" placeholder="Enter Order">
                                </div>
                                <div class="form-group">
                                    <label class='d-block'>Status</label>
                                    <input type="radio" id="active" name="status" value="1" {{ ($menu->status == 1) ? 'checked' : ''  }}>
                                    <label for="active">Active</label><br>
                                    <input type="radio" id="inactive" name="status" value="0" {{ ($menu->status == 0) ? 'checked' : ''  }}>
                                    <label for="inactive">Inactive</label><br>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Save</button>
                                <a href={{ url('/menu') }} class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection