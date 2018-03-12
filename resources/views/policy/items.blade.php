@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('policy/'.$policy->id.'/items')}}" method="post" class="form-horizontal">
                <input type="hidden" value="{{csrf_token()}}" name="_token">
                <div class="card">
                    <div class="card-header">
                        <table>
                            <tr>
                                <td>Müşteri Adı</td>
                                <td>: <strong
                                            class="card-title">{{$policy->customer->first_name}} {{$policy->customer->last_name}}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Poliçe Tipi</td>
                                <td>: <strong>{{$policy->policy_type->name}}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body">

                        <div class="row form-group">
                            <div class="col col-md-3"><label
                                        class=" form-control-label">Fiyat</label></div>
                            <div class="col-12 col-md-9"><input name="price" type="number" id="text-input" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label
                                        class=" form-control-label">Açıklama</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" cols="30" rows="10"
                                          class="form-control"></textarea>
                            </div>
                        </div>
                        @foreach($policy->policy_type->features as $feature => $feature_type)
                            <div class="row form-group">
                                <div class="col col-md-3"><label
                                            class=" form-control-label">{{$feature}}</label></div>
                                <div class="col-12 col-md-9"><input type="{{$feature_type}}" id="text-input"
                                                                    name="{{$feature}}" placeholder="{{$feature}}"
                                                                    class="form-control"></div>
                            </div>
                        @endforeach

                    </div>
                    <div class="card-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check"></i> Kaydet
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="items" class="table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <script>

        typesTable = $('#items').DataTable({
            dom: 'Bfrtip',
            "data": {!! $policy->items !!},
            "columns": [
                {"data": "id"},
                {"data": "price"},
                {
                    data: null,
                    "orderable": false,
                    render: function (data, type, row) {
                        return '<button class="btn btn-sm btn-danger" onclick="deleteType(' + data.id + ')">Delete</button>';
                    }
                }
            ],
            "buttons": [
                'copy', 'excel', 'pdf'
            ]
        });


        function deleteType(id) {
            swal("Are you sure to delete", {buttons: ["Cancel", true]}).then((answer) => {
                if (answer) {
                    axios.post(url('policy/types/' + id + '/delete'), {})
                        .then(function (response) {
                            swal("Deleted!", response.data.message, "success");
                            typesTable.ajax.reload();
                        })
                        .catch(function (error) {
                            console.log(error.response);
                            swal("Error", error.message + '\n' + error.response.data.message, "error");
                        });
                }
            });

        }
    </script>

@stop
