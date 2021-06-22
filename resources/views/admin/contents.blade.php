@extends('admin.index')

@section('content')
    <section class="content">
        <div class="row">
            <h2 class="mt-4 mb-4 ml-2">List Content</h2>
            <div class="col-md-12">
            <a href={{ url('/contents/add') }} class="btn btn-success">Create</a>
                <table id="data_users_side" class="table table-bordered table-striped" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th width="13%">Menu</th>
                            <th width="80%">Description</th>
                            <th width="7%">Action</th>
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
            $('#data_users_side').DataTable({
                // processing: true,
                // serverSide: true,
                // ajax: "/solutions/all",
                columns: [
                    {
                        data: 'desc_menu',
                        name: 'desc_menu'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endpush