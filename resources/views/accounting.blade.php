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
        <div class="col-lg-7">
            <div class="card">

                <div class="card-body card-block">
                    <form class="form-inline" action="{{url('accounting/create')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group mx-sm-1 mb-2">
                            <select name="customer_id" id="" class="form-control form-control-sm select2">
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="sr-only">Borç</label>
                            <input type="number" class="form-control form-control-sm" name="debt" placeholder="Borç" value="0">
                        </div>
                        <div class="form-group mx-sm-1 mb-2">
                            <label class="sr-only">Alacak</label>
                            <input type="number" class="form-control form-control-sm" name="credit" placeholder="Alacak" value="0">
                        </div>
                        <div class="form-group mx-sm-1 mb-2">
                            <label class="sr-only">Açıklama</label>
                            <input type="text" class="form-control form-control-sm" name="description" placeholder="Açıklama">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mb-2">Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <table id="policies" class="table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cari</th>
                    <th>Borç</th>
                    <th>Alacak</th>
                    <th>Açıklama</th>
                    <th>Oluşturma Tarihi</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <script>

        typesTable = $('#policies').DataTable({
            dom: 'Bfrtip',
            "data": {!! $accountingRecords!!},
            "columns": [
                {"data": "id"},
                {"data": "customer.full_name"},
                {"data": "debt"},
                {"data": "credit"},
                {"data": "description"},
                {"data": "created_at"},

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





