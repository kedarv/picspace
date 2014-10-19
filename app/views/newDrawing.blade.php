@extends('layout')

@section('content')

{{var_dump($data)}}

You are at {{$data['lat']}}, {{$data['lon']}}

{{ Form::open(array('action' => 'HomeController@newFormAction')) }}
What do you want your masterpeice to be called? <br>
{{ Form::text('drawingName') }}
{{Form::submit('create!')}}
{{ Form::close() }}

@stop