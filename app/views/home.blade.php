@extends('layout')

@section('js')
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'); }}
	{{ HTML::script('js/raphael.js'); }}
	{{ HTML::script('js/json2.js'); }}
	{{ HTML::script('js/raphael.sketchpad.js'); }}
@stop

@section('content')
<style>
body {

background: #cecece;
}
</style>
<div id="editor"></div>

<script type="text/javascript">
	var sketchpad = Raphael.sketchpad("editor", {
		width: 400,
		height: 400,
		editing: true
	});

	// When the sketchpad changes, update the input field.
	sketchpad.change(function() {
		$("#data").val(sketchpad.json());
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