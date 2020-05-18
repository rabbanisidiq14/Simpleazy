@extends('layouts.app')

@section('content')

@if(\Session::has('success'))
    <div class="alert alert-success">
        <div>{{ session('success') }}</div>
    </div>
@endif

<div class="container">
    <a href="/join_room" class="btn btn-primary">Gabung</a>
    <a href="/create_room" class="btn btn-primary">Buat Ruangan</a>
</div>


    <h2 class="display-1 text-center">Ruangan Anda</h2>
    @if(isset($owned_room))
    <div class="container">
    <div class="row">
        @foreach($owned_room as $admin)
        <div class="col-md-3">
            <div class="card">
                @if(empty($admin->foto))
                <img src="images/mars.png" class="card-img-top" alt="...">
                @endif
                @if(!empty($admin->foto))
                <img src="images/{{ $admin->foto }}" class="card-img-top" alt="...">
                @endif                
                <div class="card-body">
                    <h5 class="card-title"><a href="/r/{{ Auth::user()->id }}/{{ $admin->id_room }}">{{ $admin->nama_room }}</a></h5>
                    <p class="card-text">{{ $admin->id_room }}</p>
                </div>
            </div>
        </div>
        @endforeach 
    </div>

    
    {{-- <div class="row">
        <div class="col-md-3">
            <div class="card">
             <div class="image">
                @if(empty($admin->foto))
                <img src="images/mars.png" style="width: 100%; height: 200px;" />
                @endif
                @if(!empty($admin->foto))
                <img src="images/{{ $admin->foto }}" style="width: 100%; height: 200px;">
                @endif
            </div>
                <div class="card-inner">
                     <div class="header">
                        <h2><a href="r/{{ Auth::user()->id }}/{{ $admin->id_room }}">{{ $admin->nama_room }}</a></h2>
                 </div>
                    <div class="content">
                        <p>{{ $admin->id_room }}</p>
                     </div>
                 </div>
             </div>
        </div> --}}
         
    @else
        <p>Kosong.. Buat ruangan anda sekarang!</p>
    @endif

    <div class="row justify-content-center">
        <div class="col">
            <div class="card p-4">
                <h4 class="display-5">Ruangan yang anda gabungi!</h4>
                @foreach($joined_room as $member)
                    <a href="/r/{{ Auth::user()->id }}/{{ $member->id_room }}">{{ $member->nama_room }}</a>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

@endsection
