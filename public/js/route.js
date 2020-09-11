// 地図初期化（適当な場所を表示）
let map = new google.maps.Map(document.getElementById("map"), {
    zoom : 10,
    center: new google.maps.LatLng(35.7, 139.7), 
    mayTypeId: google.maps.MapTypeId.ROADMAP
});

let directionsService = new google.maps.DirectionsService;
let directionsRenderer = new google.maps.DirectionsRenderer;

let start = document.getElementById('start').value;
let end = document.getElementById('end').value;

// ルート検索を実行
directionsService.route({
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING,
    unitSystem: google.maps.directionsUnitSystem.METRIC,
    optimizeWaypoints: true,
    avoidHighways: false,
    avoidTolls: false   
}, function(response, status) {
    console.log(response);
    if (status === google.maps.DirectionsStatus.OK) {
        // ルート検索の結果を地図上に描画
        directionsRenderer.setMap(map);
        directionsRenderer.setDirections(response); 
    }
});


//オプション
// 車　地点５箇所　マーカー　ライン　経路順メッセ　