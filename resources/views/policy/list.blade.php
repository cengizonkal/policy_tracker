@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3>Poliçeler</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11">
            <table id="policies" class="table table-sm table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Poliçe Türü</th>
                    <th>Poliçe Şirketi</th>
                    <th>Poliçe Tutarı</th>
                    <th>İndirim</th>
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
            "language": {
                "url": url("datatables.turkish.lang")
            },
            "columns": [
                {"data": "id"},
                {"data": "customer.first_name"},
                {"data": "customer.last_name"},
                {"data": "policy_type.name"},
                {"data": "policy_company.title", "defaultContent": "Belirtilmedi"},
                {"data": "total_price"},
                {"data": "discount"},
                {"data": "start_at"},
                {"data": "valid_until"},
                {
                    data: null,
                    "orderable": false,
                    render: function (data, type, row) {
                        return `<div class="dropdown">
                            <button class="btn btn-secondary btn-sm  dropdown-toggle" type="button"  data-toggle="dropdown"  >
                            <span class="ti-menu"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="` + url('customer/' + data.customer_id + '/policies') + `">Cari</a>
                            <a class="dropdown-item" href="` + url('customer/' + data.customer_id + '/accounting') + `">Muhasebe</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Güncelle</a>
                            <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="` + url('policy/' + data.id + '/delete') + `" >Sil</a>
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

