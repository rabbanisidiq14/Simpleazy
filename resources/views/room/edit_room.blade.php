@extends('layouts.app')

@section('content')
<div class="container">
	@foreach($old_value as $old)
	<form action="/e/process" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			@csrf
			Nama Ruangan:
			<input type="text" name="nama_room" value="{{ $old->nama_room }}" class="form-control">
			Preview:
			<img src="/images/{{ $old->foto }}" class="rounded mx-auto d-block img-thumbnail">
			<input type="file" name="foto" value="{{ $old->foto }}" class="form-control">
			<input type="hidden" name="id_user" value="{{ $admin }}">
			<input type="hidden" name="id_room" value="{{ $id_room }}">
			<button type="submit" class="btn btn-primary">Ubah</button>
		</div>
	</form>
	@endforeach
</div>

@endsection