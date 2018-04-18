@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('reports/policy_company/filter')}}" method="get" novalidate="novalidate">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Poliçe Şirketleri Raporu</strong>
                    </div>

                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label
                                                class=" form-control-label">Başlangıç - Bitiş</label></div>
                                    <div class="col-md-4">
                                        <input type="date" name="from_date" class="form-control form-control-sm"
                                               value="{{\Carbon\Carbon::today()->toDateString()}}">
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4">
                                        <input type="date" name="to_date" class="form-control form-control-sm"
                                               value="{{\Carbon\Carbon::today()->addYear()->toDateString()}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-check"></i> Raporla
                            </button>
                        </div>
                    </div>
                </div> <!-- .card -->
            </form>
        </div>
    </div>
@stop



