@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="preloader flex-column justify-content-center align-items-center">


    <img src="pictures/tcm_new.png"
         class="animation__shake"
         alt="Preloader Image"
         width="400"
         height="400">

</div>
<div class="row">
<div class="col-lg-4 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3>{{ $kantor }}</h3>
<p>Total Cabang</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-4 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>{{ $hitunginput->input }}</h3>
<p>Total Closed</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-4 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>@php echo $kantor-$hitunginput->input; @endphp</h3>
<p>Total Open</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

</div>

<div class="row">
    <div class="col-lg-6">
    <div class="card">
    <div class="card-header border-0">
    <div class="d-flex justify-content-between">
    <h3 class="card-title">Parameter TCM</h3>
    {{-- <a href="#">View Report</a> --}}
    </div>
    </div>
    <div class="card-body">

    <div class="position-relative mb-4">
    <canvas id="chart"></canvas>
    </div>
    </div>
    </div>
    </div>

    <div class="col-lg-6">
    <div class="card">
    <div class="card-header border-0">
    <div class="d-flex justify-content-between">
    <h3 class="card-title">Penginputan KPI</h3>
    {{-- <a href="javascript:void(0);">View Report</a> --}}
    </div>
    </div>
    <div class="card-body">

    <div class="position-relative mb-4">
    <canvas id="sales-chart" height="430"></canvas>
    </div>
    </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header border-0">
        <h2 class="card-title">Data Cabang</h2>
        <div class="card-tools">
        <a href="#" class="btn btn-tool btn-sm">
        <i class="fas fa-download"></i>
        </a>
        <a href="#" class="btn btn-tool btn-sm">
        <i class="fas fa-bars"></i>
        </a>
        </div>
        </div>
        <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-striped" id="example1">
        <thead>
        <tr>
        <th>Nama Cabang</th>
        <th>KPI Resource (60%)</th>
        <th>KPI Proses (40%)</th>
        <th>Result</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($datakantor as $a)
                @php
                    if($a->hasilnya >= 85)
                    {
                        $catrs8 = "Well Implemented";
                        $catrs8bg = "green";
                    }elseif($a->hasilnya >= 70)
                    {
                        $catrs8 = "Medium Implemented";
                        $catrs8bg = "yellow";
                    }elseif($a->hasilnya < 70)
                    {
                        $catrs8 = "low Implemented";
                        $catrs8bg = "red";
                    }
                    else {
                        $catrs8 = "-";
                        $catrs8bg = "-";
                    }

                    //hitung KPI
                    $evaluation1 = $a->result1;
                    if($a->result3+$a->result5+$a->result7 >= 2)
                    {
                        $evaluation2 = "O";
                        $evaluationshow2 = 1;
                    }
                    else {
                        $evaluation2 = "X";
                        $evaluationshow2 = 0;
                    }
                    $evaluation13 = $a->result25;
                    if($a->result20+$a->result21+$a->result22 >= 2)
                    {
                        $evaluation14 = "O";
                        $evaluationshow14 = 1;
                    }
                    else {
                        $evaluation14 = "X";
                        $evaluationshow14 = 0;
                    }
                    if($a->result26+$a->result27 >= 2)
                    {
                        $evaluation16 = "O";
                        $evaluationshow16 = 1;
                    }
                    else {
                        $evaluation16 = "X";
                        $evaluationshow16 = 0;
                    }
                    if($a->result33+$a->result35+$a->result37+$a->result39 >= 3)
                    {
                        $evaluation17 = "O";
                        $evaluationshow17 = 1;
                    }
                    else {
                        $evaluation17 = "X";
                        $evaluationshow17 = 0;
                    }
                    if($a->result28+$a->result29+$a->result31 >= 2)
                    {
                        $evaluation18 = "O";
                        $evaluationshow18 = 1;
                    }
                    else {
                        $evaluation18 = "X";
                        $evaluationshow18 = 0;
                    }
                    if($a->result44+$a->result45+$a->result46 >= 2)
                    {
                        $evaluation19 = "O";
                        $evaluationshow19 = 1;
                    }
                    else {
                        $evaluation19 = "X";
                        $evaluationshow19 = 0;
                    }
                    if($a->result50+$a->result51 >= 2)
                    {
                        $evaluation25 = "O";
                        $evaluationshow25 = 1;
                    }
                    else {
                        $evaluation25 = "X";
                        $evaluationshow25 = 0;
                    }
                    $finalcat = ($evaluation1+$evaluationshow2+$a->result11+$a->result12+$a->result13+$a->result14+$a->result15+$a->result16+$a->result17+$a->result19+$a->result49+$evaluation13+$evaluationshow14+$evaluationshow16+$evaluationshow17+$evaluationshow18+$a->result42+$a->result43+$evaluationshow19+$a->result47+$a->result48+$a->result49+$evaluationshow25+$a->result52)/24;

                    if($finalcat*100 >= 85)
                    {
                        $finalcats = "Well Implemented";
                        $finalcatsbg = "green";
                    }elseif($finalcat*100 >= 70)
                    {
                        $finalcats = "Medium Implemented";
                        $finalcatsbg = "yellow";
                    }elseif($finalcat*100 < 70)
                    {
                        $finalcats = "low Implemented";
                        $finalcatsbg = "red";
                    }

                    if($a->hasilnya == "") { $a->hasilnya = 0; }
                @endphp
            <tr>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->hasilnya }}%</td>
                <td>{{ $finalcat*100 }}%</td>
                    @if($a->hasilnya >= 60 && $finalcat*100 >= 40)
                        <td>
                            <h2><span class="badge badge-success">High</span></h2>
                        </td>
                    @elseif($a->hasilnya >= 60 && $finalcat*100 < 40)
                        <td>
                            <h2><span class="badge badge-warning">Medium</span></h2>
                        </td>
                    @elseif($a->hasilnya < 60 && $finalcat*100 >= 40)
                        <td>
                            <h2><span class="badge badge-warning">Medium</span></h2>
                        </td>
                    @elseif($a->hasilnya < 60 && $finalcat*100 < 40)
                        <td>
                            <h2><span class="badge badge-danger">Low</span></h2>
                        </td>
                    @endif
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
        </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
@stop

@section('js')
<script src="https://unpkg.com/chart.js@2.8.0/dist/Chart.bundle.js"></script>
<script src="https://unpkg.com/chartjs-gauge@0.3.0/dist/chartjs-gauge.js"></script>
    <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
           $(function(){'use strict'
        var ticksStyle={fontColor:'#495057',fontStyle:'bold'}
        var mode='index'
        var intersect=true
        var $salesChart=$('#sales-chart')
        var salesChart=new Chart($salesChart,{type:'bar',data:{labels:['JUN','JUL','AUG','SEP','OCT','NOV','DEC'],datasets:[{backgroundColor:'#007bff',borderColor:'#007bff',data:[1000,2000,3000,2500,2700,2500,3000]}]},options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,callback:function(value){if(value>=1000){value/=1000
        value+='k'}
        return '$'+value}},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})
        var $visitorsChart=$('#visitors-chart')
        var visitorsChart=new Chart($visitorsChart,{data:{labels:['18th','20th','22nd','24th','26th','28th','30th'],datasets:[{type:'line',data:[100,120,170,167,180,177,160],backgroundColor:'transparent',borderColor:'#007bff',pointBorderColor:'#007bff',pointBackgroundColor:'#007bff',fill:false},{type:'line',data:[60,80,70,67,80,77,100],backgroundColor:'tansparent',borderColor:'#ced4da',pointBorderColor:'#ced4da',pointBackgroundColor:'#ced4da',fill:false}]},options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,suggestedMax:200},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})});
        var randomScalingFactor = function() {
  return Math.round(Math.random() * 100);
};

var randomData = function () {
  return [
    randomScalingFactor(),
    randomScalingFactor(),
    randomScalingFactor()
  ];
};

var randomValue = function (data) {
  return Math.max.apply(null, data) * Math.random();
};

var data = randomData();
var value = randomValue(data);

var config = {
  type: 'gauge',
  data: {
    //labels: ['Success', 'Warning', 'Warning', 'Error'],
    datasets: [{
      data: data,
      value: value,
      backgroundColor: ['red', 'yellow', 'green'],
      borderWidth: 2
    }]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: 'Gauge chart Parameter TCM'
    },
    layout: {
      padding: {
        bottom: 30
      }
    },
    needle: {
      // Needle circle radius as the percentage of the chart area width
      radiusPercentage: 2,
      // Needle width as the percentage of the chart area width
      widthPercentage: 3.2,
      // Needle length as the percentage of the interval between inner radius (0%) and outer radius (100%) of the arc
      lengthPercentage: 80,
      // The color of the needle
      color: 'rgba(0, 0, 0, 1)'
    },
    valueLabel: {
      formatter: Math.round
    }
  }
};

window.onload = function() {
  var ctx = document.getElementById('chart').getContext('2d');
  window.myGauge = new Chart(ctx, config);
};

document.getElementById('randomizeData').addEventListener('click', function() {
  config.data.datasets.forEach(function(dataset) {
    dataset.data = randomData();
    dataset.value = randomValue(dataset.data);
  });

  window.myGauge.update();
});
    </script>
@stop
