$('#search').click(function() {
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
            directionsRenderer.setMap(map);
            directionsRenderer.setDirections(response);
            directionsRenderer.setPanel(document.getElementById('route'))

        }
    });


    //オプション
    // 車　地点５箇所　マーカー　ライン　経路順メッセ　
});
