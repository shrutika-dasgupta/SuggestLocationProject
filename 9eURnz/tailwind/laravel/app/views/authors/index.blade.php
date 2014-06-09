<h1>Authors Home Page</h1>

@layout('../layouts.default')	
@section('content')
	@if(isset($name))
		{{ $name }}</br>
	@else
		No name given
	@endif

	{{ $age }}</br>
	{{ $location }}</br>
	{{ $speciality }}</br>
@endsection
