<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="http://maps.google.com/maps/api/js?key={{ config('services.google-map.apikey') }}&language=ja"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'&gt;>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/stylesheet.css') }}">
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
    <p id="search" class="btn btn-primary">取得</p>
    <div id="map"></div>
        
<script type="text/javascript" src="{{ asset('/js/route.js') }}"></script>
</body>
</html>