@extends('layouts.app')

@section('content')
<h1 class="text-center">Stats</h1>
<div class="container">
    <canvas id="myChart"></canvas>
    <a href="{{ url('/r') }}/{{ $id_admin }}/{{ $id_room }}" class="btn btn-primary">Kembali</a>
</div>
	
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: {
            labels: ['Dibayar','Belum Bayar'],
            datasets: [{
                label: 'Kas Status',
                backgroundColor: 'rgb(1, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [{{$dibayar}},{{$belum_bayar}}]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>
@endsection