'use strict';

initialize();

$('#search').click(function(){
    geocodingLocation();
});


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

function geocodingLocation(){
    //Geocoding API 住所を座標に変換
    let address = document.getElementById('address_search');
    let param;
    if(address.checked){
        param = document.getElementById('address').value;
    }else{
        param = document.getElementById('name').value;
    }
    let geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        'address': param,
        'language': 'ja',
        'region': 'jp'
      },function(results, status){
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
            document.getElementById('address').value = address;
            console.log(address);
            }
        }
      }
    );
  }

// $(function(){
//     if($('input[name="search"]:checked').val() === 'name'){
//         $('#address').prop('disabled', true);
//     }
//     $('input[name="search"]').change(function(){
//         if($('input[name="search"]:checked').val() === 'name'){
//             $('#address').prop('disabled', true);
//             $('#address').val("")
//         }else{
//             $('#address').prop('disabled', false);
//         }
//     });
// });
