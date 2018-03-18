<div class="row">
    <div class="col-lg-6">
        <section class="card">
            <div class="card-header user-header alt bg-dark">
                <div class="media">
                    <div class="media-body">
                        <div class="col-lg-11">
                            <h2 class="text-light">{{$customer->full_name}} </h2>
                        </div>
                        <div class="col-lg-1 pull-right">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm  dropdown-toggle" type="button"
                                        data-toggle="dropdown">
                                    <span class="ti-menu"></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{url('customer/'.$customer->id.'/policies')}}">Poliçeler</a>
                                    <a class="dropdown-item" href="{{url('customer/'.$customer->id.'/accounting')}}">Muhasebe</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Güncelle</a>
                                    <a class="dropdown-item" href="#">Sil</a>
                                </div>
                            </div>
                        </div>
                        <p>{{$customer->phone}}</p>
                        <p> {{$customer->email}}</p>
                    </div>
                </div>

            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <i class="fa fa-minus"></i> Toplam Borç <span
                            class="badge badge-secondary pull-right">{{$customer->total_debt}}</span>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-plus"></i> Toplam Alacak <span
                            class="badge badge-danger pull-right">{{$customer->total_credit}}</span>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-money"></i> Bakiye <span
                            class="badge badge-info pull-right r-activity">{{$customer->balance}}</span>
                </li>
            </ul>

        </section>
    </div>
</div>

