@extends('layouts.app')

@section('content')
	<div class="container">
		<form method="POST" action="/b/process">
			@csrf
			<div class="form-group">
				<label>Bayar?</label>
				<br>
				<input type="checkbox" name="status" class="form-check-input" value="dibayar">
				<input type="hidden" name="id_user" value="{{ $id_user }}">
				<input type="hidden" name="id_room" value="{{ $id_room }}">
				<input type="hidden" name="id_kas" value="{{ $id_kas }}">
				<button class="btn btn-primary">Kirim Tanggapan</button>
			</div>
		</form>
	</div>
@endsection