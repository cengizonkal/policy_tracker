<header id="header" class="header">
    <div class="header-menu">
        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                               aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>

                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        @if($followups->count()>0)
                            <span class="count bg-danger">{{$followups->count()}}</span>
                        @endif
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        @if($followups->count()<=0)<p>Bildiriminiz yok.</p>@endif
                        @foreach($followups->orderBy('id','desc')->take(3)->get() as $followup)
                            <a class="dropdown-item media " href="{{url('followup/list')}}">
                                <p>({{$followup->policy->policyType->name}}){{$followup->policy->customer->full_name}}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <h5 class="user-avatar rounded-circle">{{\Auth::user()->getInitials()}}</h5>
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{url('logout')}}"><i class="fa fa-power -off"></i>Çıkış</a>
                </div>
            </div>
        </div>
    </div>

</header><!-- /header -->

