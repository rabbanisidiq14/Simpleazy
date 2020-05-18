@extends('layouts.app')

@section('content')
	<div class="container">
		<!-- EDIT ROOM ACCESS ALERT -->
		@if(\Session::has('danger'))
			<div class="alert alert-danger">
				{{ session('danger') }}
			</div>
		@endif
		@if(\Session::has('added'))
			<div class="alert alert-danger">
				{{ session('added') }}
			</div>
		@endif
		<!-- EDIT ROOM ACCESS ALERT -->

		@foreach($nama_room as $nama_rooms)
			@if(\Session::has('admin'))
				<h1 class="display-2">{{ $nama_rooms->nama_room }}<a href="/er/{{ Auth::user()->id }}/{{ $id_room }}"><sup>*Edit</sup></a></h1>
			@else
				<h1 class="display-2">{{ $nama_rooms->nama_room }}</h1>
			@endif
		@endforeach

		<!-- Iterate -->
		<ul class="list-group">
		@foreach($admin as $admins)
			@if(Auth::user()->id == $admins->id)
			<li class="list-group-item">Administrator:<b>{{ $admins->name }}(You)</b></li>
			@else
			<li class="list-group-item">Administrator: <b>{{ $admins->name }}</b></li>
			@endif
		@endforeach
		<!-- Kalo admin -->
			@if(\Session::has('admin'))
			<li class="list-group-item">Bagikan token ruangan mu: 
				<b id="copy">{{ $id_room }}</b>
				<button class="btn btn-primary btns" data-clipboard-text="{{ $id_room }}">Copy Token</button>
			</li>
			<!-- Invite using email links -->
			<li class="list-group-item">Undang anggota: <a href="">Undang</a></li>
			<!-- Setting Ruangan -->
			<li class="list-group-item"><a href="/s/{{ Auth::user()->id }}/{{ $id_room }}">Buat Pengumpulan Kas</a></li>
			<li class="list-group-item"><a href="/d/{{ Auth::user()->id}}/{{ $id_room }}/lists">Task</a></li>
			<li class="list-group-item"><a href="/stats/{{ Auth::user()->id }}/{{ $id_room }}/details">Stats</a></li>
			@elseif(\Session::has('member'))
			@endif
		</ul>

		{{-- Kalo member --}}
		@if(\Session::has('member'))
			@foreach($kas as $ks)
			<!-- Move this code to another page. -->
	<a href="/b/{{ Auth::user()->id }}/{{ $id_room }}/{{ $ks->id_kas }}">{{ $ks->status }}</a>
			@endforeach
		@endif

<!-- THIS IS UR PAGES -->
<br>
	{{-- Admin --}}
	@if(\Session::has('admin'))
		<div class="form-group" id="my">
			<p>Cari anggota:</p>
			<input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		</div>
		
		<div class="navbar bg-dark">
			<h4 class="display-4" style="text-decoration: none;color: white;">Daftar anggota</h4>
		</div>
		<div id="myUL" style="width: 100%;height: 50px;background-color: #eeeded;text-decoration: none; float: left;">
			<div class="list-group">
			@foreach($member as $members)
		  		<a href="/member_info/{{ $members->id }}/{{ $id_room }}" class="list-group-item">{{ $members->name }}</a>
		  	@endforeach
		  </div>
		</div>
	@endif

	{{-- Member --}}
	@if(\Session::has('member'))
		<div class="form-group" id="my">
			<p>Cari anggota:</p>
			<input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		</div>
		
		<div class="navbar bg-dark">
			<h4 class="display-4" style="text-decoration: none;color: white;">Daftar anggota</h4>
		</div>
		<div id="myUL" style="width: 100%;height: 50px;background-color: #eeeded;text-decoration: none; float: left;">
			<ul style="list-style: none;" class="list-group">
			@foreach($member as $members)
				@if(Auth::user()->id == $members->id)
		  		<li class="list-group-item">{{ $members->name }}.(You)</li>
		  		@else
		  		<li class="list-group-item" style="color: black; text-decoration: none;">{{ $members->name }}</li>
		  		@endif
		  	@endforeach
			</ul>
		</div>
	@endif
	</div>

	<!-- JS Filter -->
	<script>
	function myFunction() {
	    var input, filter, ul, li, a, i, txtValue;
	    input = document.getElementById("myInput");
	    filter = input.value.toUpperCase();
	    ul = document.getElementById("myUL");
	    li = ul.getElementsByTagName("li");
	    for (i = 0; i < li.length; i++) {
	        a = li[i].getElementsByTagName("a")[0];
	        txtValue = a.textContent || a.innerText;
	        if (txtValue.toUpperCase().indexOf(filter) > -1) {
	            li[i].style.display = "";
	        } else {
	            li[i].style.display = "none";
	        }
	    }
	}

	var clipboard = new ClipboardJS('.btns');

	clipboard.on('success', function(e) {
		console.info('Action:', e.action);
		console.info('Text:', e.text);
		console.info('Trigger:', e.trigger);

		e.clearSelection();
	});

	clipboard.on('error', function(e) {
		console.error('Action:', e.action);
		console.error('Trigger:', e.trigger);
	});

	$('.btns').click(function() {
		alert("Copied!");
	})
	</script>
@endsection