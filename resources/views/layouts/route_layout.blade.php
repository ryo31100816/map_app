<!DOCTYPE html>
<html lang="ja">
<head>
    @include('layouts.head')
    <script src="https://maps.google.com/maps/api/js?key={{ config('services.google-map.apikey') }}&language=ja"></script>
</head>
<body>
    <header>@include('layouts.header')</header>
    @yield('content')
    <div class="container"><div id="search" class="btn btn-primary">取得</div></div>
    <div id="route"></div>
    <div id="map"></div>
    <script type="text/javascript" src="{{ asset('/js/location_ajax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/route_search.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/history_form.js') }}"></script>
</body>
</html>