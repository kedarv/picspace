@extends('layout')
  

  @section('append_header')

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script>
         var json = '{"current":{"lon":10,"lat":10},"drawings":[{"lon":20,"lat":20,"name":"thing0","id":"id_0"},{"lon":30,"lat":30,"name":"name thing1","id":"id_1"},{"lon":40,"lat":40,"name":"name thing2","id":"id_2"}]}';
      var locations = JSON.parse(json);
    function initialize() {
      var myLatlng = new google.maps.LatLng(locations.current.lon,locations.current.lat);
      var mapOptions = {
        zoom: 4,
        center: myLatlng
      }
     
      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      var infowindow = new google.maps.InfoWindow();
      var marker;
      var i = 0; 
      console.log(locations.drawings.length);
      for(i = 0;i < locations.drawings.length; i++)
      {
         marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations.drawings[i].lon,locations.drawings[i].lat),
          map: map,
          title: 'Hello World!'
        });console.log(locations.drawings[i].lon);
         console.log(locations.drawings[i].lat);
         console.log(locations.drawings[i].name);
         google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations.drawings[i].name);
          infowindow.open(map, marker);
        }
      })(marker, i));
      }
       
       
    }
    
    google.maps.event.addDomListener(window, 'load', initialize);

        </script>
  @section('content')
    <div id="map-canvas" style="width:500px;height:380px;"></div>
  @stop
@stop