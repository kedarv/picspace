@extends('layout')

@section('content')
<h1>Add Draw Point</h1>
<hr/>
Creating a Draw Point allows other people within a mile of your creation location to draw with you. You can give it a name to make your Draw Point sound interesting!
<hr/>
@if($data['counter']  >= 5)
	<div class="alert alert-info">
		Hey! There's currently too many Draw Points within your area. Contribute to the current Draw Points, and come back later!
	</div>
@else
	{{ Form::open(array('action' => 'HomeController@newFormAction')) }}
	{{ Form::text('drawingName', '', array('class' => 'form-control', 'style' => 'width:25%', 'placeholder' => 'Draw Point Name'))}}
	<br/>
	{{ Form::submit('Create Draw Point &raquo;', ['class' => 'btn btn-large btn-primary'])}}
	{{ Form::close() }}
@endif
@stop