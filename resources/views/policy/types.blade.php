@extends('layouts.app')
@section('content')
    <script src="{{asset('datatables/Buttons-1.5.1/js/buttons.html5.js')}}"></script>
    <br>
    <br>
    <table id="types" class="table table-sm table-hover" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>

        </tr>
        </thead>
    </table>
    <script>

        typesTable = $('#types').DataTable({
            dom: 'Bfrtip',
            "ajax": {
                url: '{{url('policy/types')}}',
                type: "POST",
                "dataSrc": ""
            },
            "columns": [
                {"data": "id"},
                {"data": "name"},
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
                            swal("Error", error.message+'\n'+error.response.data.message, "error");
                        });
                }
            });

        }
    </script>
@stop

