'use strict';
/*global $, google */

// geocodeのための、地図を生成するコールバック関数
function createMap(result, status) {
  if (status === google.maps.GeocoderStatus.OK) {
    //console.log(result);
    var myPosition = result[0].geometry.location;
    var myOptions = {
      zoom : 14,
      center : myPosition,
      mapTypeId : google.maps.MapTypeId.ROADMAP
    };
    var myMap = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  }
}
 
// 住所から位置を取得し、地図を生成する
function drawMap(myAddress) {
  // 住所から位置を取得するためのオブジェクト
  var geocoder = new google.maps.Geocoder();
 
  // 住所から位置を取得し、その結果を使って地図を生成する
  geocoder.geocode( {
    address : myAddress
  }, createMap); // コールバック関数createMap()は上で定義されている
}

