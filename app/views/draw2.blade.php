
@extends('layout')


@section('js')
{{HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js')}}
{{HTML::script('js/responsive-sketchpad.js')}}
{{HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js')}}
{{HTML::style('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css')}}
@stop

@section('content')
<a href="#" id="copy">Copy</a>

<div style="position: relative;">
<canvas id="sketch-viewer" style="position: absolute; left: 0; top: 0; z-index: 0;">Your browser does not support HTML5 Canvas.</canvas>
<canvas id="sketch" style="position: absolute; left: 0; top: 0; z-index: 1;">Your browser does not support HTML5 Canvas.</canvas>
</div>

<script>
    var sketchpad = $('#sketch').sketchpad({
        aspectRatio: 1,
        backgroundColor: 'transparent'
    });
    sketchpad.setLineSize(3);

    var viewer = $('#sketch-viewer').sketchpad({
        aspectRatio: 1,
        backgroundColor: 'transparent',
        locked: true
    });

    function copyJSON() {
        var json = sketchpad.json();
        viewer.jsonLoad(json)
        console.log(json);
    }

    // --------- Visual effects ---------------

    $('#copy').click(function() {
        copyJSON();
    });

    $('.resize').resizable({
        aspectRatio: 1,
        maxHeight: 500,
        maxWidth: 500,
        minHeight: 200,
        minWidth: 200
    });


    // --------- Tools ---------------

    // Color
    var colors = ['black', 'red', 'orange', 'yellow', 'green', 'blue', 'violet', 'indigo'];
    $('#btn-color').click(function() {
        var color = colors[Math.floor(Math.random() * colors.length)];
        sketchpad.setLineColor(color);
    });

 

</script>

@stop