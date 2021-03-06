@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table id="customers" class="table table-sm table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Poliçe Tipi</th>
                    <th>Poliçe Tutarı</th>
                    <th>Bitiş Tarihi</th>
                    <th>Müşteri Tipi</th>
                    <th>Açıklama</th>
                    <th>İşlem</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


    <script>

        typesTable = $('#customers').DataTable({
            dom: 'Bfrtip',
            "data": {!! $followups !!},
            "order": [[5, "desc"]],
            responsive: true,
            "columns": [
                {"data": "id"},
                {"data": "policy.customer.first_name"},
                {"data": "policy.customer.last_name"},
                {"data": "policy.policy_type.name"},
                {"data": "policy.price"},
                {"data": "policy.valid_until"},
                {"data": "policy.customer.customer_type.description","defaultContent":"Belirtilmedi"},
                {"data": "description"},
                {
                    "data": null, "orderable": false, render: function (data, type, row) {
                    return `<form action="` + url('followup/' + data.id + '/close') + `" method="post">
	<div class="col-lg-12">
		<div class="input-group">
		<input type="text" class="form-control form-control-sm" placeholder="Sonuç" name="result">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
			<span class="input-group-btn">
			<button class="btn btn-secondary btn-sm" type="submit">Kapat</button>
			</span>
		</div>
	</div>
</form>`;
                }
                },

                {
                    data: null,
                    "orderable": false,
                    render: function (data, type, row) {
                        return `<div class="dropdown">
                            <button class="btn btn-secondary btn-sm  dropdown-toggle" type="button"  data-toggle="dropdown"  >
                            <span class="ti-menu"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="` + url('customer/' + data.policy.customer.id + '/policies') + `">Poliçeler</a>
                            <a class="dropdown-item" href="` + url('customer/' + data.policy.customer.id + '/accounting') + `">Muhasebe</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="` + url('customer/' + data.policy.customer.id + '/update') + `">Güncelle</a>
                            <a class="dropdown-item" href="#">Sil</a>
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



