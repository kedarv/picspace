@extends('layout')
  
    <!--@section('title')
      Simple Map
    @stop-->
  <!--<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">-->
  @section('append_header')
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
    <script type="text/javascript"
      src=" https://maps.googleapis.com/maps/api/js">
    </script>
    <script type="text/javascript">
      $(document).ready(function() {

        var map;
        function initialize() {
          var mapOptions = {
            zoom: 8,
            center: new google.maps.LatLng(-34.397, 150.644),
            mapTypeId: AIzaSyDVLb2EpDmeojFZr1pM8orGkg_lTmIxDyE
          };
          map = new google.maps.Map(document.getElementById('map-canvas'),
                                    mapOptions);
        }

        google.maps.event.addDomListener(window, 'load', initialize);

        });

    </script>
  @stop
  @section('content')
    <div id="map-canvas"></div>
  @stop
@stop