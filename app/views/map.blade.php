@extends('layout')

  @section('append_header')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
      var json = '{{$data['json']}}';
      var result = new Array();
      var name;
         //console.log(json);
      var locations = JSON.parse(json);
      function initialize() {
        var myLatlng = new google.maps.LatLng({{Session::get('lat')}},{{Session::get('lon')}});
        var mapOptions = {
          zoom: 14,
          center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var infowindow = new google.maps.InfoWindow();
        var marker;
        var i = 0; 
      //console.log(locations.drawings.length);
        for(i = 0;i < locations.drawings.length; i++)
        {
          marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations.drawings[i].lat,locations.drawings[i].lon),
          map: map,
          title: 'Hello World!'
        });
        //console.log(locations.drawings[i].lon);
        //console.log(locations.drawings[i].lat);
        //console.log(locations.drawings[i].name);
        //result[i] = 
        //console.log(result[i]);
        //console.log(name[i].link(locations.drawings[i].link));
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            var name = locations.drawings[i].name;
            infowindow.setContent(name.link(locations.drawings[i].link));
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  @stop
  
  @section('content')
    <div id="map-canvas" style="width:500px;height:380px;"></div>
  @stop