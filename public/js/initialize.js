function initialize(){
    const latitude = document.getElementById('latitude').value;
    const longitude = document.getElementById('longitude').value;
    let MyLatLng = new google.maps.LatLng(latitude, longitude); //(1 緯度,2 経度 )
    let Options = {
        zoom: 15,      //地図の縮尺値
        center: MyLatLng,    //地図の中心座標
        mapTypeId: 'roadmap'   //地図の種類
        };
    let map = new google.maps.Map(document.getElementById('map'), Options);
    map.setCenter(MyLatLng);
    new google.maps.Marker({position:MyLatLng, map:map});
}
