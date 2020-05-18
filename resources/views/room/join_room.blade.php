@extends('layouts.app')

@section('content')
	
	@if(\Session::has('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif

	@if(\Session::has('m_exists'))
		<div class="alert alert-danger">
			{{ session('m_exists') }}
		</div>
	@endif

	@if(\Session::has('a_exists'))
		<div class="alert alert-danger">
			{{ session('a_exists') }}
		</div>
	@endif

	<div class="container">
		<div class="card p-4 col-4">
			<form action="/join_process" method="GET">
				<h2>Masukkan token</h2>
				<br>
				<input type="text" name="id_room" class="input">
				<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
				<button type="submit" class="btn btn-primary">Gabung!</button>
			</form>
			<br>
			<div class="card-footer">
				<a class="btn btn-primary btn-block" href="{{ url('home') }}">Batalkan</a>
			</div>
		</div>
	</div>

@endsection
