'use strict';

initialize();

$('#search').click(function() {
    geocodingRoute();  
});

function initialize(){
    if(navigator.geolocation){
        console.log('NavigatorOK');
        navigator.geolocation.getCurrentPosition(function(position) {
            console.log(position.coords.latitude);
            console.log(position.coords.longitude);
            // 緯度経度の取得
            let latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            console.log(latLng);
            // 地図の作成
            let map = new google.maps.Map(document.getElementById('map'), {
                center: latLng,
                zoom: 50
            });
            // マーカーの追加
            let marker = new google.maps.Marker({
                position: latLng,
                map: map
            });
        })
    }else {
        console.log('NavigatorFail');
    }
}

function geocodingRoute() {
    let directionsService = new google.maps.DirectionsService;
    let directionsRenderer = new google.maps.DirectionsRenderer;

    let start = document.getElementById('start_name').value;
    let end = document.getElementById('end_name').value;

    // ルート検索を実行
    directionsService.route({
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.DirectionsUnitSystem.METRIC,
        optimizeWaypoints: true,
        avoidHighways: false,
        avoidTolls: false   
    }, function(response, status) {
        console.log(response);
        if (status === google.maps.DirectionsStatus.OK) {
            // ルート検索の結果を地図上に描画
            let map = new google.maps.Map(document.getElementById('map'));
            directionsRenderer.setMap(map);
            directionsRenderer.setDirections(response);
            directionsRenderer.setPanel(document.getElementById('route'))

        }
    });
    //オプション
    // 車　地点５箇所　マーカー　ライン　経路順メッセ　
};
