@extends('layouts.app')

@section('content')
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Status</th>
            <th scope="col">Tagih</th>
          </tr>
        </thead>
        <tbody>
        @php
            $i = 1;    
        @endphp
        @foreach ($status as $s)
          <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{$s->name}}</td>
            <td>{{$s->status}}</td>
            <td><a href="/member_info/{{$s->id}}/{{$s->id_room}}">Tagih</a></td>
          </tr>
        @php
            $i++;
        @endphp
        @endforeach
        </tbody>
      </table>
@endsection