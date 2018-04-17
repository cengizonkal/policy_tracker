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
                        <td>{{$company->policies->count()}}</td>
                        <td>{{$company->policies->sum('discount')}}</td>
                        <td>{{$company->policies->sum('price')}}</td>
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

