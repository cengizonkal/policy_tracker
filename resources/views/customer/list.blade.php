@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3>Cariler</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="customers" class="table table-sm table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Bakiye</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <script>

        typesTable = $('#customers').DataTable({
            dom: 'Bfrtip',
            "data": {!! $customers !!},
            "columns": [
                {"data": "id"},
                {"data": "first_name"},
                {"data": "last_name"},
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
                            <a class="dropdown-item" href="`+url('customer/'+ data.id+'/policies')+`">Poliçeler</a>
                            <a class="dropdown-item" href="`+url('customer/'+ data.id+'/accounting')+`">Muhasebe</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="`+url('customer/'+ data.id+'/update')+`">Güncelle</a>
                            <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="`+url('customer/'+ data.id+'/delete')+`">Sil</a>
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
@stop

