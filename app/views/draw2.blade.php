
@extends('layout')


@section('js')
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'); }}
{{HTML::script('//cdn.firebase.com/js/client/1.1.2/firebase.js')}}
{{HTML::script('js/responsive-sketchpad.js')}}
@stop



@section('content')
<script>
    var sketchpad = $('#sketch').sketchpad({
        aspectRatio: 1,
        backgroundColor: '#fff'
    });
    sketchpad.setLineSize(3);

    var viewer = $('#sketch-viewer').sketchpad({
        aspectRatio: 1,
        backgroundColor: '#fff',
        locked: true
    });
</script>
<canvas id="sketch" width="800" height="800"></canvas>
@stop