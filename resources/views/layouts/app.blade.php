<!doctype html>
<html>
@include('layouts.head')
<body>
@include('layouts.left_panel')
<div id="right-panel" class="right-panel">
@include('layouts.header')


    <div class="content">
        @yield('content')
    </div>

</div>
<!-- Right Panel -->
@include('layouts.footer')
</body>
</html>
