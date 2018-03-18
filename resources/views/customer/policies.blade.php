@extends('layouts.app')
@section('content')
    @include('common.customer_info')

    <h3>Poliçeler</h3>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <table id="policies" class="table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Poliçe Türü</th>
                    <th>Poliçe Tutarı</th>
                    <th>Bitiş Tarihi</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <script>

        typesTable = $('#policies').DataTable({
            dom: 'Bfrtip',
            "data": {!! $customer->policies!!},
            "columns": [
                {"data": "id"},
                {"data": "policy_type.name"},
                {"data": "total_price"},
                {"data":"valid_until"},
                {
                    data: null,
                    "orderable": false,
                    render: function (data, type, row) {
                        return '<button class="btn btn-sm btn-danger" onclick="deleteType(' + data.id + ')">Sil</button>';
                    }
                }
            ],
            "buttons": [
                'copy', 'excel', 'pdf'
            ]
        });


    </script>
@stop



