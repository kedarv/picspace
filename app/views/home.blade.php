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
var myFirebaseRef = new Firebase("https://picspace.firebaseio.com");
</script>
<div id="editor"></div>
<textarea rows="5" cols="20" id="data"></textarea>
<script type="text/javascript">
	var sketchpad = Raphael.sketchpad("editor", {
		width: 400,
		height: 400,
		editing: true
	});

	// When the sketchpad changes, update the input field.
	sketchpad.change(function() {
		var data_json = sketchpad.json();
		myFirebaseRef.set({
  			data: data_json,
  		});
		$("#data").val(data_json);
		console.log(data_json);
	});
</script>
<div id="viewer"></div>

<script type="text/javascript">
	var strokes = [{
		type:"path",
		path:[["M",10,10],["L",390,390]],
		fill:"none", "stroke":"#000000",
	}];
	var sketchpad = Raphael.sketchpad("viewer", {
		width: 400,
		height: 400,
		strokes: strokes,
		editing: false
	});
</script>
@stop