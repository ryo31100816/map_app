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
        @yield('content')
    </div>
    <p id="search" class="btn btn-primary">取得</p>
        
<script type="text/javascript" src="{{ asset('/js/route.js') }}"></script>
</body>
</html>