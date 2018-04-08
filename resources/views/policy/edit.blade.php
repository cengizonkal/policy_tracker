@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('policy/'.$policy->id.'/update')}}" method="post" class="form-horizontal">
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
                                <td>: <strong>{{$policy->policyType->name}}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body">

                        <div class="row form-group">
                            <div class=" col-md-3"><label
                                        class=" form-control-label">Poliçe Tutarı</label></div>
                            <div class="col-md-4">
                                <input name="price" type="number" class="form-control form-control-sm "
                                       placeholder="Tutar" value="{{$policy->price}}">
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <input name="discount" type="number" class="form-control form-control-sm "
                                       placeholder="İndirim" value="{{$policy->discount}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class=" col-md-3"><label
                                        class=" form-control-label">Poliçe Şirketi</label></div>
                            <div class="col-md-4">
                                <select name="policy_company_id" class="form-control form-control-sm">
                                    @foreach($policyCompanies as $policyCompany)
                                        <option value="{{$policyCompany->id}}"
                                                @if($policy->policy_company_id ==$policyCompany->id ) selected @endif>{{$policyCompany->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label
                                        class=" form-control-label">Poliçe Tarihi (Başlangıç/Bitiş)</label></div>
                            <div class="col-md-4">
                                <input type="date" name="start_at" class="form-control form-control-sm"
                                       value="{{$policy->start_at->toDateString()}}">
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <input type="date" name="valid_until" class="form-control form-control-sm"
                                       value="{{$policy->valid_until->toDateString()}}" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label
                                        class=" form-control-label">Açıklama</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" cols="30" rows="10"
                                          class="form-control form-control-sm">{{$policy->description}}</textarea>
                            </div>
                        </div>
                        @foreach($policy->policyType->features as $feature)
                            <div class="row form-group">
                                <div class="col col-md-3"><label
                                            class=" form-control-label">{{$feature['title']}}</label></div>
                                <div class="col-12 col-md-9"><input type="{{$feature['type']}}" id="text-input"
                                                                    name="{{$feature['name']}}"
                                                                    placeholder="{{$feature['title']}}"
                                                                    value="{{$policy->features[$feature['name']]}}"
                                                                    class="form-control form-control-sm"></div>
                            </div>
                        @endforeach

                    </div>
                    <div class="card-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check"></i> Güncelle
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



@stop


