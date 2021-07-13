@extends('admin.index')

@section('content')
    <section class="content">
        <div class="row">
            <h2 class="mt-4 mb-4 ml-2">List Profile</h2>
            <div class="col-md-12">
            <a href={{ url('/menu/add') }} class="btn btn-success mb-3">Create</a>
                <table id="data_menus" class="table table-bordered table-striped" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th width="13%">No</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#data_menus').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/menu/all",
                columns: [
                    {
                        data: 'rownum',
                        name: 'rownum'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'parent',
                        name: 'parent'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                    
                ]
            });
        });
    </script>
@endpush