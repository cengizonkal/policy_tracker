@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3>Poliçeler </h3>
            <small>({{$request->get('from_date')}} <=> {{$request->get('to_date')}})</small>


        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-11">
            <table id="report" class="table table-sm table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Şirket</th>
                    <th>Toplam Poliçe Sayısı</th>
                    <th>Toplam İndirim</th>
                    <th>Toplam Tutar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->title}}</td>
                        <td>{{$company->policies()->accountable()->where('start_at','>=',$request->get('from_date'))->where('start_at','<=',$request->get('to_date'))->count()}}</td>
                        <td>{{$company->policies()->accountable()->where('start_at','>=',$request->get('from_date'))->where('start_at','<=',$request->get('to_date'))->sum('discount')}}</td>
                        <td>{{$company->policies()->accountable()->where('start_at','>=',$request->get('from_date'))->where('start_at','<=',$request->get('to_date'))->sum('price')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        typesTable = $('#report').DataTable();
    </script>
@stop

