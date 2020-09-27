<!DOCTYPE html>
<html lang="ja">
<head>
    @include('layouts.head')
    <script src="http://maps.google.com/maps/api/js?key={{ config('services.google-map.apikey') }}&language=ja"></script>
</head>
<body>
    <header>@include('layouts.header')</header>
    <div id="map"></div>
    <div id="route"></div>
    <div class="container">
        <p id="search" class="btn btn-primary">取得</p>
        @yield('content')
    </div>
<script type="text/javascript" src="{{ asset('/js/route_initialize.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/route.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/history_form.js') }}"></script>
</body>
</html>