<div id="main-menu" class="main-menu collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="{{url('/')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
        </li>
        <h3 class="menu-title">Poliçeler</h3><!-- /.menu-title -->
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="menu-icon fa fa-users"></i>Müşteriler</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-id-badge"></i><a href="{{url('policy/create')}}">Yeni Müşteri</a></li>
                <li><i class="fa fa-id-badge"></i><a href="{{url('customer/list')}}">Müşteri Liste</a></li>
            </ul>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="menu-icon fa fa-file"></i>Poliçeler</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-file"></i><a href="{{url('policy/create')}}">Yeni Poliçe</a></li>
                <li><i class="fa fa-list"></i><a href="{{url('policy/list')}}">Poliçe Listesi</a></li>
                <li><i class="fa fa-plus"></i><a href="{{url('policy/create_existing')}}">Müşteriye Yeni Poliçe</a></li>
                <li><i class="fa fa-id-badge"></i><a href="{{url('policy/types')}}">Poliçe Tipleri</a></li>
            </ul>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="menu-icon fa fa-sticky-note"></i>Takip</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-id-badge"></i><a href="{{url('followup/list')}}">Takip Listesi</a></li>

            </ul>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="menu-icon fa fa-money"></i>Muhasebe</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-list"></i><a href="{{url('accounting/list')}}">Hareketler</a></li>
                <li><i class="fa fa-list"></i><a href="{{url('accounting/summary')}}">Liste</a></li>
            </ul>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="menu-icon fa fa-question"></i>Raporlar</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-list"></i><a href="{{url('reports/policy_company')}}">Poliçe Şirketleri</a></li>
            </ul>
        </li>

    </ul>
</div>