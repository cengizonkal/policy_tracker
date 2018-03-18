@extends('layouts.app')
@section('content')
    @include('common.customer_info')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-body card-block">
                    <form class="form-inline" action="{{url('customer/'.$customer->id.'/accounting/add')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group mb-2">
                            <label class="sr-only">Borç</label>
                            <input type="number" class="form-control" name="debt" placeholder="Borç">
                        </div>
                        <div class="form-group mx-sm-1 mb-2">
                            <label class="sr-only">Alacak</label>
                            <input type="number" class="form-control" name="credit" placeholder="Alacak">
                        </div>
                        <div class="form-group mx-sm-1 mb-2">
                            <label class="sr-only">Açıklama</label>
                            <input type="text" class="form-control" name="description" placeholder="Açıklama">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Oluştur</button>
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
            "data": {!! $customer->accountingRecords!!},
            "columns": [
                {"data": "id"},
                {"data": "debt"},
                {"data": "credit"},
                {"data":"description"},
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
                            <a class="dropdown-item" href="`+url('customer/'+ data.id+'/policies')+`">Sil</a>
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





