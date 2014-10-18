@extends('layout')

@section('js')
@stop

@section('content')
{{HTML::style('http://fonts.googleapis.com/css?family=Rock+Salt')}}
<style>
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
@stop