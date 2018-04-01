@extends('layouts.app')
@section('content')
    <link href="{{url('css/select2.min.css')}}" rel="stylesheet"/>
    <script src="{{url('js/select2.min.js')}}"></script>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{url('policy/create_existing')}}" method="post" novalidate="novalidate">
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
                                    <legend>Müşteri</legend>
                                    <hr>
                                    <div class="form-group">
                                        <select name="customer_id" id="" class="form-control form-control-sm select2">
                                            @foreach($customers as $customer)
                                                <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                                            @endforeach
                                        </select>
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

    <script>

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop
