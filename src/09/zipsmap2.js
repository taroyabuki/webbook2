'use strict';
/*global $, google */

var myMap; // グローバル
var positions = new Array();

$(document).ready(function() {
  if ($('.address').length === 0) return; // 結果がないときはマップを描かない

  // マップを生成する
  var myOptions = {
    zoom : 14, // とりあえずの倍率
    center : new google.maps.LatLng(0, 0), // とりあえずの中心
    mapTypeId : google.maps.MapTypeId.ROADMAP
  };
  myMap = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

  var geocoder = new google.maps.Geocoder();

  // class属性が「address」であるものを取り出し、その内容（つまり住所）から緯度経度を取得
  // マーカーにして、「住所 (緯度, 経度)」のラベルを付ける
  $('.address').each(function() {
    var myAddress = $(this).text();
    geocoder.geocode( {
      address : myAddress
    }, function(result, status) { // geocodeのコールバック関数
          if (status === google.maps.GeocoderStatus.OK) {
            var myPosition = result[0].geometry.location;
            positions[positions.length] = myPosition;
            new google.maps.Marker( {
              position : myPosition,
              map : myMap,
              title : myAddress + ' (' + myPosition.lat() + ', ' + myPosition.lng() + ')'
            });
            resetCenter(); // マップの中心と範囲を更新
      }
    } // ここまでコールバック関数
    );
  });
});

/*
 * マップの中心と範囲を更新する。 各マーカーの緯度経度の平均を中心に、 全マーカーを含めるように範囲を設定する。
 * 緯度経度の境界を含む場合のことは考えていない。
 */
function resetCenter() {
  var minLat, maxLat, minLng, maxLng;
  var avgLat = 0;
  var avgLng = 0;
  for (var i = 0; i < positions.length; i++) {
    var lat = positions[i].lat();
    var lng = positions[i].lng();
    if (i === 0) {
      minLat = maxLat = lat;
      minLng = maxLng = lng;
    } else {
      if (lat < minLat) minLat = lat;
      if (lat > maxLat) maxLat = lat;
      if (lng < minLng) minLng = lng;
      if (lng > maxLng) maxLng = lng;
    }
    avgLat += lat;
    avgLng += lng;
  }
  // マップの中心
  avgLat /= positions.length;
  avgLng /= positions.length;
  myMap.setCenter(new google.maps.LatLng(avgLat, avgLng));

  // マップの範囲
  var southWestCorder = new google.maps.LatLng(minLat, minLng);
  var northEastCorder = new google.maps.LatLng(maxLat, maxLng);
  myMap.fitBounds(new google.maps.LatLngBounds(southWestCorder, northEastCorder));
}