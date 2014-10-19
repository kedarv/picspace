<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" content="{{ Session::token() }}">
    <meta content="utf-8" http-equiv="encoding">
    <title>@section('title')@show</title>
    @section('css')
    {{ HTML::style('css/bootstrap.min.css'); }}
    {{ HTML::style('css/bootstrap-tagsinput.css'); }}
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'); }}
    @show

    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'); }}
    @section('js')
    @show
<script>
function getLocation() {
	var options = null;
	var browserChrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
    if (navigator.geolocation) {
		if (browserChrome) {
			options={enableHighAccuracy: false, maximumAge: 15000, timeout: 30000};
		}
		else {
			options={maximumAge:Infinity, timeout:0};
		}
        navigator.geolocation.getCurrentPosition(showPosition, getGeoLocationErrorCallback, options);
    }
	else {
	}
	function getGeoLocationErrorCallback() {
		console.log("Error");
	}
}

function showPosition(position) {
    // console.log(position.coords.latitude);
    // console.log(position.coords.longitude);
    var location = {};
    location['lat']=position.coords.latitude;
    location['lon']=position.coords.longitude;
    $.ajax({
		type: "POST",
        url: "{{action('HomeController@locationPost')}}",
        data: location,
    	success:function (data) {
			console.log(data);
    	},
        dataType: 'json'
    });
}
$(document).ready(function(){
	getLocation();
});
</script>
    @section('append_header')@show    
</head>
<body>

@include('nav')
<div class="container" style="margin-top:20px;">
    @yield('content')
</div>
@section('bottom_js')
@show

</body>
</html>