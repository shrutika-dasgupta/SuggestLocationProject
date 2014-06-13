@extends('layouts.restLayout')

@section('content')
	<center>
		<h1>Find Me Food</h1>
	</center>
	<center>
	
	{{ Form::open(array('url'=>'display')) }}
	<table>
		<tr><td>Enter what to search	:</td><td> {{ Form::text('userCategory','Category') }}</td></tr>
		<tr><td>Enter Location			:</td><td> {{ Form::text('userLat','Latitude') }}</td><td>{{ Form::text('userLong','Longitude')}}</td></tr>
	</table>	
	{{ Form::submit('submit') }}
	
	</center>
	{{ Form::close() }}
@stop