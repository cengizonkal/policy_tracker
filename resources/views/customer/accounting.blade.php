@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <section class="card">
                <div class="card-header user-header alt bg-dark">
                    <div class="media">
                        <div class="media-body">
                            <h2 class="text-light display-6">{{$customer->full_name}}</h2>
                            <p>{{$customer->phone}}</p>
                            <p> {{$customer->email}}</p>
                        </div>
                    </div>
                </div>


                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="fa fa-minus"></i> Toplam Borç <span
                                class="badge badge-secondary pull-right">{{$customer->total_debt}}</span>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-plus"></i> Toplam Alacak <span
                                class="badge badge-danger pull-right">{{$customer->total_credit}}</span>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-money"></i> Bakiye <span
                                class="badge badge-info pull-right r-activity">{{$customer->balance}}</span>
                    </li>
                </ul>

            </section>
        </div>
    </div>
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





