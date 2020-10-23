<!DOCTYPE html>
<html lang="ja">
<head>
    @include('layouts.head')
    <script src="http://maps.google.com/maps/api/js?key={{ config('services.google-map.apikey') }}&language=ja"></script>
</head>
<body>
    <header>@include('layouts.header')</header>
    @yield('content')
    <div id="map"></div>
    <script type="text/javascript" src="{{ asset('/js/location_search.js') }}"></script>
</body>
</html>