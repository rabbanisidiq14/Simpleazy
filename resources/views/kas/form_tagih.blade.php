@extends('layouts.app')

@section('content')
<div class="container">
	<form action="{{ url('/mengirim') }}" method="GET">
		@csrf
		<div class="row">
			<div class="col p-5">
				<h4>To:</h4>
				<br>
				<div class="form-group">
					<input type="text" name="to" value="{{ $email }}" readonly="" class="form-control">
				</div>
			</div>
			<div class="col p-5">
				<h4>Subject:</h4>
				<br>
				<div class="form-group">
					<input type="text" name="subject" placeholder="Write subject.." class="form-control">
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col p-1">
				<h4>Pesan:</h4>
				<div class="form-group">
					<textarea rows="10" name="pesan" class="form-control" placeholder="Write something here.."></textarea>
				</div>	
			</div>
		</div>
			<button class="btn btn-block btn-primary" type="submit">kirim</button>
	</form>
</div>
@endsection