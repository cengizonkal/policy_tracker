@extends('layouts.app')
@section('content')
    <script src="{{url('datatables/Responsive-2.2.1/js/dataTables.responsive.min.js')}}"></script>
    <div class="row">
        <div class="col-lg-12">
            <h3>Poliçeler</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11">
            <table id="policies" cellspacing="0" width="100%" class="table table-sm table-hover nowrap">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>Müşteri Tipi</th>
                    <th>Poliçe Türü</th>
                    <th>Poliçe Şirketi</th>
                    <th>Poliçe Tutarı</th>
                    <th>İndirim</th>
                    <th>Başlangıç Tarihi</th>
                    <th>Bitiş Tarihi</th>
                    <th>P/A</th>
                    <th data-priority="99999">Detay</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($policies as $policy)
                    <tr>
                        <td></td>
                        <td>{{$policy->id}}</td>
                        <td>{{$policy->customer->full_name}}</td>
                        <td>{{$policy->customer->customerType->description or ''}}</td>
                        <td>{{$policy->policyType->name or ''}}</td>
                        <td>{{$policy->policyCompany->title or ''}}</td>
                        <td>{{$policy->total_price}}</td>
                        <td>{{$policy->discount}}</td>
                        <td>{{$policy->start_at->format('d-m-Y')}}</td>
                        <td>{{$policy->valid_until->format('d-m-Y')}}</td>
                        <td>{{$policy->accountable}}</td>
                        <td>
                            @foreach ((array)$policy->features as $key => $feature)
                                <strong>{{title_case($key)}}:</strong>{{$feature}}&nbsp;&nbsp;
                            @endforeach

                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm  dropdown-toggle" type="button"
                                        data-toggle="dropdown">
                                    <span class="ti-menu"></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"
                                       href="{{url('customer/'.$policy->customer_id.'/policies') }}">Cari</a>
                                    <a class="dropdown-item"
                                       href="{{url('customer/'.$policy->customer_id.'/accounting')}}">Muhasebe</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{url('policy/'.$policy->id.'/edit')}}">Güncelle</a>
                                    <a class="dropdown-item" onclick="return confirm('Are you sure?')"
                                       href="{{url('policy/' . $policy->id.'/delete') }}">Sil</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>

        typesTable = $('#policies').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            "language": {
                "url": url("datatables.turkish.lang")
            },

            "buttons": [
                'copy', 'excel', 'pdf'
            ]
        });


    </script>
@stop

