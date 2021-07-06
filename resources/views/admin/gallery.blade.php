@extends('admin.index')

@section('content')
    <section class="content">
        <div class="row">
            <h2 class="mt-4 mb-4 ml-2">List Galleries</h2>
            <div class="col-md-12">
            <a href={{ url('/galleries/add') }} class="btn btn-success  mb-3">Create</a>
                <table id="data_gallery" class="table table-bordered table-striped" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th width="13%">No</th>
                            <th width="70%">Title</th>
                            <th width="50%">Status</th>
                            <th width="47%">Action</th>
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
            $('#data_gallery').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/galleries/all",
                columns: [
                    {
                        data: 'rownum',
                        name: 'rownum'
                    },
                    {
                        data: 'title',
                        name: 'title'
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