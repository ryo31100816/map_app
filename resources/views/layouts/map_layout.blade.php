<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="http://maps.google.com/maps/api/js?key={{ config('services.google-map.apikey') }}&language=ja"></script>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'&gt;>
    <style>
    html { height: 80% }
    body { height:80% }
    #map { height: 80%; width: 50%}
    </style>
    
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
        <div id="map"></div>

<script type="text/javascript" src="{{ asset('/js/location_search.js') }}"></script>
</body>
</html>