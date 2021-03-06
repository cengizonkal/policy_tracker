@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3>Poliçe Şirketleri</h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="{{url('policy/create')}}" method="post" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Poliçe Oluştur</strong>
                    </div>

                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">

                                <fieldset>
                                    <legend>Müşteri Tipi</legend><hr>
                                    <div class="form-group">

                                        <select name="customer_type_id" class="form-control">
                                            @foreach($customerTypes as $customerType)
                                                <option value="{{$customerType->id}}">{{$customerType->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Müşteri</legend>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Adı</label>
                                        <input name="first_name" type="text" class="form-control" required
                                               placeholder="Müşteri Adı"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Soyadı</label>
                                        <input name="last_name" type="text" class="form-control" required
                                               placeholder="Müşteri Soyadı"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Adres</label>
                                        <textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Email</label>
                                        <input name="email" type="email" class="form-control" required
                                               placeholder="Email"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Telefon</label>
                                        <input name="phone" type="text" class="form-control" required
                                               placeholder="Telefon"/>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Poliçe Türü</legend>
                                    <hr>
                                    <div class="form-group">
                                        <select name="policy_type_id" class="form-control">
                                            @foreach($policyTypes as $policyType)
                                                <option value="{{$policyType->id}}">{{$policyType->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>


                            </div>

                        </div>

                    </div>
                    <div class="card-footer ">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-check"></i> Oluştur
                            </button>
                        </div>
                    </div>
                </div> <!-- .card -->
            </form>
        </div>
    </div>
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@stop
