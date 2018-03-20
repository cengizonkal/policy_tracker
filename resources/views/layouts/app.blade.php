<!doctype html>
<html>
@include('layouts.head')
<body>
@include('layouts.left_panel')
<div id="right-panel" class="right-panel">
    @include('layouts.header')


    <div class="content">
        @if (session('message'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                         {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </div>

</div>
<!-- Right Panel -->
@include('layouts.footer')
</body>
</html>
