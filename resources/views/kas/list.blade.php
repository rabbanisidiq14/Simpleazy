@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List Pengumpulan</h1>
        @foreach ($task as $tasks)
            <div class="row">
                <div class="col">
                <a href="{{ url('/d') }}/{{ $id_user }}/{{ $id_room }}/details/{{ $tasks->id_kas }}">{{ $tasks->deskripsi }}</a>
                </div>
            </div>
        @endforeach
        <a href="{{ url('/r') }}/{{ Auth::user()->id }}/{{ $id_room }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection