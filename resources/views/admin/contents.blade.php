@extends('admin.index')

@section('content')
    <section class="content">
        <div class="row">
            <h2 class="mt-4 mb-4 ml-2">List Content</h2>
            <div class="col-md-12">
            <a href={{ url('/contents/add') }} class="btn btn-success  mb-3">Create</a>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        function deleteFunc(e) {
           swal({
               title: "Are you sure?",
               text: "Once deleted, you will not be able to recover this data!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
           }).then((willDelete) => {
                if(willDelete) {
                    window.location.href = `${e.dataset.href}`
                }
           })
        }


        $(function() {
            $('#data_users_side').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/contents/all",
                columns: [
                    {
                        data: 'name',
                        name: 'name'
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