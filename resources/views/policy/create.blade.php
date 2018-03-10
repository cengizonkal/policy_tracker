@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Poliçe Oluştur</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="{{url('policy/create')}}" method="post" novalidate="novalidate">
                                <fieldset>
                                    <legend>Müşteri</legend>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Adı</label>
                                        <input name="first_name" type="text" class="form-control" required placeholder="Müşteri Adı"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Soyadı</label>
                                        <input name="last_name" type="text" class="form-control" required placeholder="Müşteri Soyadı"/>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Poliçe</legend>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Adı</label>
                                        <input name="first_name" type="text" class="form-control" required placeholder="Müşteri Adı"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Soyadı</label>
                                        <input name="last_name" type="text" class="form-control" required placeholder="Müşteri Soyadı"/>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- .card -->
        </div>
    </div>
@stop
