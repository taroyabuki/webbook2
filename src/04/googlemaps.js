$(document).ready(function() {
  $("#button").click(function() {
    // input要素の値を取得し、マップの中心を決める
    var lat = $("#lat").val();
    var lng = $("#lng").val();
    var myCenter = new google.maps.LatLng(lat, lng);
 
    // 地図のオプション
    var myOptions = {
      zoom : 14,
      center : myCenter,
      mapTypeId : google.maps.MapTypeId.ROADMAP // 必須
    };
 
    // 地図の生成
    var myMap = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
    // マーカーの生成
    new google.maps.Marker( {
      position : myCenter,
      map : myMap,
      title : "Hello World!"
    });
  });
});

