@extends('layout')

@section('js')
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
    $(document).ready(function() {
    	$(".jumbotron").delay(5000).fadeOut(2000);
    });
      var json = '{{$data['json']}}'
         //console.log(json);
      var locations = JSON.parse(json);
      function initialize() {
        var myLatlng = new google.maps.LatLng({{Session::get('lat')}},{{Session::get('lon')}});
        var mapOptions = {
			zoom: 15,
			center: myLatlng,
            disableDefaultUI: false,
        	scrollwheel: false,
   			navigationControl: false,
    		mapTypeControl: false,
    		scaleControl: true,
    		draggable: true,
        }

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var infowindow = new google.maps.InfoWindow();
        var marker;
        var i = 0; 
        var name;
      //console.log(locations.drawings.length);
          	myposition = new google.maps.Marker ({
          		position: new google.maps.LatLng({{Session::get('lat')}},{{Session::get('lon')}}),
        	});
        for(i = 0;i < locations.drawings.length; i++) {
        	//var 
          	marker = new google.maps.Marker ({
          		position: new google.maps.LatLng(locations.drawings[i].lat,locations.drawings[i].lon),
          		map: map,
         		title: name
        	});
        //console.log(locations.drawings[i].lon);
        //console.log(locations.drawings[i].lat);
        //console.log(locations.drawings[i].name);
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            name = locations.drawings[i].name;
            infowindow.setContent(name.link(locations.drawings[i].link));
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
      	var circle = new google.maps.Circle({
  			map: map,
  			radius: 1609,    // 10 miles in metres
			strokeColor: '#0033CC',
			strokeOpacity: 0.5,
			strokeWeight: 1,
			fillColor: '#0066FF',
			fillOpacity: 0.1,
		});
circle.bindTo('center', myposition, 'position');
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop

@section('content')
{{HTML::style('http://fonts.googleapis.com/css?family=Rock+Salt')}}
<style>
#map-canvas {
  height: 100%; 
  width: 100%; 
  top: 0; 
  left: 0; 
  z-index: 0;
  position:absolute;
      -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.jumbotron, .navbar {
  z-index: 1;
  position: relative;
  opacity: .8;
}
.jumbotron {
	pointer-events:none;
}
.jumbotron h2 {
	font-family: 'Rock Salt', cursive;
}
.jumbotron h1 {
	font-family: 'Rock Salt', cursive;
}
</style>
<div class="jumbotron">
<h1>Welcome to PicSpace.</h1>
<h2>Real time, collaborative, <b>location based</b> drawing</h2>
</div>
<div id="map-canvas"></div>
@stop