@extends('layouts.app')

@section('content')
<div class="container">
	<h1 class="display-4">Data Member</h1>
	<table border="1" align="center" class="table table-striped" style="width: 100%;">
		<tr>
			<th>Name</th>
			<th>Email</th>
		</tr>
		<tr>
		@foreach($member as $members)
			<td>{{ $members->name }}</td>
			<td>{{ $members->email }}</td>
		@endforeach
		</tr>
	</table>
	@foreach($member as $members)
		@if(\Session::has('admin'))
			@if(Auth::user()->id != $members->id)
			<a href="/tagih/{{ $members->email }}" class="btn btn-block btn-primary">Tagih</a>
			@else
			<p>It's You!</p>
			@endif	
		@else
		@endif
	@endforeach
</div>
@endsection