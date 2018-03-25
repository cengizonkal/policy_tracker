<!doctype html>
<html>
@include('layouts.head')
<body>
@include('layouts.left_panel')
<div id="right-panel" class="right-panel">
    @include('layouts.header')
    <div class="content">

        <div class="row">
            @if (session('message'))
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
        @yield('content')
    </div>

</div>
<!-- Right Panel -->
@include('layouts.footer')
</body>
</html>
