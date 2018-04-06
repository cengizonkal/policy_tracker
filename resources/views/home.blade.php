@extends('layouts.app')
@section('content')
    <h3>Hoşgeldiniz ...</h3>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Toplam Alacak</div>
                            <div class="stat-digit">{{number_format($balance,2,'.',',')}} TL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-bolt text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Toplam Aktif Poliçe</div>
                            <div class="stat-digit">{{$policies->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            @foreach($policyCompanies as $policyCompany)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-check text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">{{$policyCompany->title}}</div>
                                <div class="stat-digit">
                                        {{number_format($policyCompany->policies()->sum('price'),2)}} TL
                                </div>
                                <div class="stat-text">{{$policyCompany->policies()->active()->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

@stop