<div id="main-menu" class="main-menu collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="{{url('/')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
        </li>
        <h3 class="menu-title">Poliçeler</h3><!-- /.menu-title -->
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="menu-icon fa fa-users"></i>Cariler</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-id-badge"></i><a href="{{url('customer/list')}}">Liste</a></li>
            </ul>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="menu-icon fa fa-file"></i>Poliçeler</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-id-badge"></i><a href="{{url('policy/list')}}">Liste</a></li>
                <li><i class="fa fa-id-badge"></i><a href="{{url('policy/create')}}">Oluştur</a></li>
                <li><i class="fa fa-id-badge"></i><a href="{{url('policy/types')}}">Poliçe Tipleri</a></li>
            </ul>
        </li>

    </ul>
</div>