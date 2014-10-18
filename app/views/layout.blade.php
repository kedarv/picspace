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
    {{ HTML::script('js/geolocator.min.js'); }}

    @section('js')
    @show
<script type="text/javascript">
    //The callback function executed when the location is fetched successfully.
    function onGeoSuccess(location) {
        $.ajax({
            type: "POST",
            url: "{{action('HomeController@locationPost')}}",
            data: location,
            success: success,
            dataType: dataType
        });
        console.log(location);
    }
    //The callback function executed when the location could not be fetched.
    function onGeoError(message) {
        console.log(message);
    }

    window.onload = function() {
        //geolocator.locateByIP(onGeoSuccess, onGeoError, 2, 'map-canvas');
        var html5Options = { enableHighAccuracy: true, timeout: 3000, maximumAge: 0 };
        geolocator.locate(onGeoSuccess, onGeoError, true, html5Options, null);
    }
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