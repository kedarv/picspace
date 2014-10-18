@extends('layout')
  

  @section('append_header')

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script>
    function initialize() {
      var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
      var mapOptions = {
        zoom: 4,
        center: myLatlng
      }
      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

      var marker = new google.maps.Marker({
          position: new google.maps.LatLng(-15.363882,131.044922),
          map: map,
          title: 'Hello World!'
      });
       var marker_2 = new google.maps.Marker({
                position: new google.maps.LatLng(15.363882,131.044922),
                map: map,
                title: 'Hello World!'
            });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

        </script>
  @section('content')
    <div id="map-canvas" style="width:500px;height:380px;"></div>
  @stop
@stop