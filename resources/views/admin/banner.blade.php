@extends('admin.index')

@section('content')
    <section class="content">
        <div class="row">
            <h2 class="mt-4 mb-4 ml-2">List Banner</h2>
            <div class="col-md-12">
            <a href={{ url('/banner/add') }} class="btn btn-success mb-3">Create</a>
                <table id="data_banner" class="table table-bordered table-striped" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="20%">Title</th>
                            <th width="40%">Description</th>
                            <th width="20%">Status</th>
                            <th width="10%">Action</th>
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
            $('#data_banner').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/banner/all",
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
                        data: 'description',
                        name: 'description'
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