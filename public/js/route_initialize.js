// function initialize(){
    if(navigator.geolocation){
        console.log('navigatorOK');
        navigator.geolocation.getCurrentPosition(function(position) {
            // 緯度経度の取得
            latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            console.log(latLng);
            // 地図の作成
            map = new google.maps.Map(document.getElementById('map'), {
                center: latLng,
                zoom: 50
            });
     
            // マーカーの追加
            marker = new google.maps.Marker({
                position: latLng,
                map: map
            });
        })
    }else{
        console.log('navigatorFail');
    }
// }