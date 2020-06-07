@extends('layouts.app')

@section('content')
	
@if(\Session::has('error'))
	<div class="alert alert-danger">
		<div>{{ session('error') }}</div>
	</div>
@endif

	<div class="container justify-align-center" >
		<div class="card col-4 p-4">
			
			<div class="card-header">
				<h4>Buat Ruangan</h4>	
			</div>
			<br>
			<form action="{{url('/process')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<p>Nama Ruangan</p>
					<input type="text" name="nama_room">

					<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
					<br>
					<br>
					<p>Foto Ruangan<sup>*opsional</sup></p>
					<input type="file" name="foto" value="Pilih Foto">
					<br>
					<br>
					<input class="btn btn-primary" type="submit" value="Buat Sekarang!">
				
			</form>
			<br>
			<div class="card-footer">
				<a class="btn btn-primary btn-block" href="{{ url('home') }}">Batalkan</a>
			</div>
		</div>
	</div>

@endsection