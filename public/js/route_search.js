'use strict';

initialize();

$('#search').click(function() {
    event.preventDefault();
    let member_id = $('#member_id').val();
    let start_value = $('input[name = start]:checked').val();
    let end_value = $('#location_list').val();
    let $button = $('#search');
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/api/route/ajax',  //Routingのurl
        type: 'POST', //送信方法
        dataType: 'json',
        data: {'member_id': member_id, 'start': start_value, 'end': end_value},
        timeout: 10000,
        //重複送信を避けるためにボタンを無効化
        beforeSend: function(xhr, settings) {
            $button.attr('disabled', true);
        },
        //完了後ボタンを押せるように
        complete: function(xhr, textStatus) {
            $button.attr('disabled', false);
        }
    })// Ajax通信が成功した時
    .done( function(result, textStatus, jqXHR) {
        console.log('通信成功');
        console.log(result);
        let start_lat = result['start'].latitude;
        let start_lng = result['start'].longitude;
        let end_lat = result['end'].latitude;
        let end_lng = result['end'].longitude;
        geocodingRoute(start_lat, start_lng, end_lat, end_lng);  
    })
    // Ajax通信が失敗した時
    .fail(function(jqXHR, textStatus, errorThrown){
        console.log('通信失敗');
        console.log("jqXHR          : " + jqXHR.status); 
        console.log("textStatus     : " + textStatus);
        console.log("errorThrown    : " + errorThrown.message);
    })
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

function geocodingRoute(start_lat, start_lng, end_lat, end_lng) {
    let directionsService = new google.maps.DirectionsService;
    let directionsRenderer = new google.maps.DirectionsRenderer;

    // ルート検索を実行
    directionsService.route({
        origin: new google.maps.LatLng(start_lat, start_lng),
        destination: new google.maps.LatLng(end_lat, end_lng),
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.DirectionsUnitSystem.METRIC,
        optimizeWaypoints: true,
        avoidHighways: false,
        avoidTolls: false   
    }, function(result, status) {
        console.log(result);
        if (status === google.maps.DirectionsStatus.OK) {
            document.getElementById('distance').value = result.routes[0].legs[0].distance.value;
            // ルート検索の結果を地図上に描画
            let map = new google.maps.Map(document.getElementById('map'));
            directionsRenderer.setMap(map);
            directionsRenderer.setDirections(result);
            document.getElementById('route').innerHTML = '';
            directionsRenderer.setPanel(document.getElementById('route'));
        }
    });
};
