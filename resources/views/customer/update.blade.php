@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form action="{{url('customer/'.$customer->id.'/update')}}" method="post" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Müşteri Güncelle</strong>
                    </div>

                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <fieldset>
                                    <legend>Müşteri</legend>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Adı</label>
                                        <input name="first_name" type="text" class="form-control" required
                                               placeholder="Müşteri Adı"
                                               value="{{$customer->first_name}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Soyadı</label>
                                        <input name="last_name" type="text" class="form-control" required
                                               placeholder="Müşteri Soyadı"
                                               value="{{$customer->last_name}}"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Adres</label>
                                        <textarea name="address" id="" cols="30" rows="5"
                                                  class="form-control">{{$customer->address}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Email</label>
                                        <input name="email" type="email" class="form-control" required
                                               placeholder="Email" value="{{$customer->email}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Telefon</label>
                                        <input name="phone" type="text" class="form-control" required
                                               value="{{$customer->phone}}"
                                               placeholder="Telefon"/>
                                    </div>
                                </fieldset>


                            </div>

                        </div>

                    </div>
                    <div class="card-footer ">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-check"></i> Güncelle
                            </button>
                        </div>
                    </div>
                </div> <!-- .card -->
            </form>
        </div>
    </div>

@stop


