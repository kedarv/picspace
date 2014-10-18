
@extends('layout')


@section('js')

@stop



@section('content')
{{HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js')}}
{{HTML::script('js/responsive-sketchpad.js')}}
<<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<style type="text/css">body{font-family:'Lato',sans-serif;margin-bottom:60px;}section{margin-bottom:40px;}.jumbotron{margin-bottom:60px;text-align:center;background-color:#f7f7f9;padding:80px 0 120px 0;border:1px solid #e8e8ea;}.jumbotron h1{font-size:72px;line-height:1;}.jumbotron .btn{font-size:21px;padding:14px 24px;margin:0 10px;}.resize{border:1px solid #000;padding:1px;border-radius:5px;max-height:500px;max-width:500px;}.ui-effects-transfer{border:2px dotted gray;}#docs .row-fluid{}</style>

</head>
<body>

 
<section id="sketchpad">
<div class="row-fluid">
<div class="span6">
<h4>Editor</h4>
<div class="resize">
<canvas id="sketch">Your browser does not support HTML5 Canvas.</canvas>
</div>
</div>
<div class="span6">
<h4>Viewer <a id="copy" style="font-size: 10px; cursor: pointer">Click to Display</a></h4>
<div class="resize">
<canvas id="sketch-viewer">Your browser does not support HTML5 Canvas.</canvas>
</div>
</div>
</div>
<div class="pull-right" style="padding: 7px 22px 0 0">
<p class="muted" style="font-size: 12px">Resize containers to see it in action!</p>
</div>
</section>


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
</body>
</html>


@stop