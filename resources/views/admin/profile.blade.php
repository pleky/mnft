@extends('admin.index')

@section('content')
    <section class="content">
        <div class="row">
            <h2 class="mt-4 mb-4 ml-2">List Email</h2>
            <div class="col-md-12">
                <table id="data_emails" class="table table-bordered table-striped" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th width="13%">No</th>
                            <th width="80%">Email</th>
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
            $('#data_emails').DataTable({
                // processing: true,
                // serverSide: true,
                // ajax: "/emails/all",
                columns: [
                    {
                        data: 'rownum',
                        name: 'rownum'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    
                ]
            });
        });
    </script>
@endpush