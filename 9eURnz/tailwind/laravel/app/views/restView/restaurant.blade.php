@extends('layouts.restLayout')

@section('content')
	<h1>The restaurant list</h1>
	{{Form::open(array('url'=>'display'))}}
	{{Form::submit('submit')}}
	{{Form::close()}}
@stop