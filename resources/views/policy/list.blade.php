@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <table id="policies" class="table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Adı</th>
                <th>Soyadı</th>
                <th>Poliçe Türü</th>
                <th>Poliçe Tutarı</th>
                <th>Başlangıç Tarihi</th>
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
            "data": {!! $policies !!},
            "columns": [
                {"data": "id"},
                {"data": "customer.first_name"},
                {"data": "customer.last_name"},
                {"data": "policy_type.name"},

                {"data": "total_price"},
                {"data": "start_at"},
                {"data": "valid_until"},
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

