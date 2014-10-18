@extends('layout')

@section('js')
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'); }}
{{ HTML::script('js/raphael.js'); }}
{{ HTML::script('js/json2.js'); }}
{{ HTML::script('js/raphael.sketchpad.js'); }}
{{HTML::script('//cdn.firebase.com/js/client/1.1.2/firebase.js')}}
@stop

@section('content')
<style>
body {

background: #cecece;
}
</style>
<script>
var myFirebaseRef = new Firebase("https://picspace.firebaseio.com/session1");
</script>
<div id="editor"></div>
<script type="text/javascript">
	$(document).ready(function() {
		var sketchpad = Raphael.sketchpad("editor", {
			width: 400,
			height: 400,
			editing: true
		});

		// When the sketchpad changes, update the input field.
		sketchpad.change(function() {
			var data_json = sketchpad.json();
			myFirebaseRef.push({
					data: data_json,
				});
			console.log(data_json);
		});
	});
</script>
<div id="viewer"></div>

<script type="text/javascript">
	myFirebaseRef.on('value', function (snapshot) {
		returned_value = snapshot.val();
		//console.log(returned_value);
		var arr = [];
		var i = 0;
		$.each(returned_value, function( key, value ) {
			$.each(value, function( k, v ) {
				arr[i] = v;
				i++;
			});
		});
		console.log(arr);
		var strokes = [{
			type:"path",
			path: arr,
			fill:"none", "stroke":"#000000",
		}];
		var sketchpad = Raphael.sketchpad("viewer", {
			width: 400,
			height: 400,
			strokes: strokes,
			editing: false
		});
	}, function (errorObject) {
		console.log('The read failed: ' + errorObject.code);
	});
</script>
@stop