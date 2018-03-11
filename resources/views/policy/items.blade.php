@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
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
                    <form action="{{url('policy/'.$policy->id.'/details')}}" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label
                                        class=" form-control-label">Fiyat</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="text-input" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label
                                        class=" form-control-label">Açıklama</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
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
                    </form>
                </div>
                <div class="card-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-check"></i> Kaydet
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
