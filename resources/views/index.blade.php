<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://maps.google.com/maps/api/js?key=api_key&language=ja"></script>

    <style>
    html { height: 80% }
    body { height:80% }
    #map { height: 80%; width: 50%}
    </style>
</head>
<body>
    <div id="map"></div>
    <input id="start" type="text" value="東京駅">
    <input id="end" type="text" value="甲府駅"> 


    <script>
    // var MyLatLng = new google.maps.LatLng(35.6811673, 139.7670516);
    // var Options = {
    // zoom: 15,      //地図の縮尺値
    // center: MyLatLng,    //地図の中心座標
    // mapTypeId: 'roadmap'   //地図の種類
    // };
    // var map = new google.maps.Map(document.getElementById('map'), Options);


// 地図初期化（適当な場所を表示）
var map = new google.maps.Map(document.getElementById("map"), {
    zoom : 10,
    center: new google.maps.LatLng(35.7, 139.7),
    mayTypeId: google.maps.MapTypeId.ROADMAP
});

var directionsService = new google.maps.DirectionsService;
var directionsRenderer = new google.maps.DirectionsRenderer;

let start = document.getElementById('start').value;
let end = document.getElementById('end').value;

// ルート検索を実行
directionsService.route({
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
}, function(response, status) {
    console.log(response);
    if (status === google.maps.DirectionsStatus.OK) {
        // ルート検索の結果を地図上に描画
        directionsRenderer.setMap(map);
        directionsRenderer.setDirections(response); 
    }
});


    </script>
</body>
</html>