@extends('layouts.app')

@section('content')

	<div class="container">
		<form action="/s/process" method="GET">
			@csrf
			<div class="form-group">
				<label>Jumlah:</label>
				<input type="number" name="jumlah" class="form-control col-sm-3">
			</div>
			<div class="form-group">
				<label>Deksripsi</label>
				<textarea class="form-control" name="deskripsi" placeholder="Write something.." class="form-control">
				</textarea>
			</div>
			<input type="hidden" name="id_user" value="{{ $id_user }}">
			<input type="hidden" name="id_room" value="{{ $id_room }}">
			<button type="submit" class="btn btn-primary btn-block">Buat!</button>
		</form>
	</div>

@endsection