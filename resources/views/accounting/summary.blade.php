@extends('layouts.app')
@section('content')
    <link href="{{url('css/select2.min.css')}}" rel="stylesheet"/>
    <script src="{{url('js/select2.min.js')}}"></script>
    <div class="row">
        <div class="col-lg-12">
            <h3>Muhasebe</h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <table id="policies" class="table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Cari</th>
                    <th>Borç</th>
                    <th>Alacak</th>
                    <th>Bakiye</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <script>

        typesTable = $('#policies').DataTable({
            dom: 'Bfrtip',
            "data": {!! $customers!!},
            "columns": [
                {"data": "full_name"},
                {"data": "total_debt"},
                {"data": "total_credit"},
                {"data": "balance"},
                {
                    data: null,
                    "orderable": false,
                    render: function (data, type, row) {
                        return `<div class="dropdown">
                            <button class="btn btn-secondary btn-sm  dropdown-toggle" type="button"  data-toggle="dropdown"  >
                            <span class="ti-menu"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="` + url('accounting/' + data.id + '/delete') + `">Sil</a>
                        </div>
                        </div>`;
                    }
                }
            ],
            "buttons": [
                'copy', 'excel', 'pdf'
            ]
        });


    </script>

    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@stop





