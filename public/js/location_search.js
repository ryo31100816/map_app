//Geocoding API 住所を座標に変換
let address = document.getElementById('address').value;
let geocoder = new google.maps.Geocoder();
geocoder.geocode(
  {
    'address': address,
    'language': 'ja',
    'region': 'jp'
  },
  function(results, status){
    if(status==google.maps.GeocoderStatus.OK){
        console.log(results);
         // 結果の表示範囲。結果が１つとは限らないので、LatLngBoundsで用意。
        var bounds = new google.maps.LatLngBounds();

        for (var i in results) {
        // 緯度経度を取得
        let latlng = results[0].geometry.location;
        console.log(latlng);

        let MyLatLng = new google.maps.LatLng(latlng); //(1 緯度,2 経度 )
        let Options = {
            zoom: 15,      //地図の縮尺値
            center: MyLatLng,    //地図の中心座標
            mapTypeId: 'roadmap'   //地図の種類
            };
        let map = new google.maps.Map(document.getElementById('map'), Options);

        map.fitBounds(results[0].geometry.viewport);
        map.setCenter(latlng);
        new google.maps.Marker({position:latlng, map:map});
        document.getElementById('latitude').value = latlng.lat();
        document.getElementById('longitude').value = latlng.lng();
        // 住所を取得
        let address = results[0].formatted_address;
        console.log( address );
        }
    }
  }
);



// 地図初期化（適当な場所を表示）
// let map = new google.maps.Map(document.getElementById("map"), {
//     zoom : 10,
//     center: new google.maps.LatLng(35.7, 139.7),
//     mayTypeId: google.maps.MapTypeId.ROADMAP
// });
