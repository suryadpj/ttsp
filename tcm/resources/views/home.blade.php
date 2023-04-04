@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3>6</h3>
<p>Total Cabang</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>3<sup style="font-size: 20px">%</sup></h3>
<p>Cabang Selesai input</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>3</h3>
<p>Cabang Belum Input</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>Tunas Toyota</h3>
<p>Cabang Terbaik</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
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
    <h3 class="card-title">Gauge Speed</h3>
    <a href="#">View Report</a>
    </div>
    </div>
    <div class="card-body">

    <div class="position-relative mb-4">
    <canvas id="chart"></canvas>
    </div>
    </div>
    </div>

    <div class="card">
    <div class="card-header border-0">
    <h3 class="card-title">Cabang Terbaik</h3>
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
    <table class="table table-striped table-valign-middle">
    <thead>
    <tr>
    <th>Nama Cabang</th>
    <th>Nilai KPI</th>
    <th>KPI Terbaik</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>
    Tunas Toyota A
    </td>
    <td>A</td>
    <td>
    Sales
    </td>
    </tr>
    <tr>
    <td>
    Tunas Toyota B
    </td>
    <td>A</td>
    <td>
    Aftersales
    </td>
    </tr>
    <tr>
    <td>
    Tunas Toyota C
    </td>
    <td>B</td>
    <td>
    Sales
    </td>
    </tr>
    <tr>
    <td>
    Tunas Toyota D
    </td>
    <td>B</td>
    <td>
    Sales
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>

    </div>

    <div class="col-lg-6">
    <div class="card">
    <div class="card-header border-0">
    <div class="d-flex justify-content-between">
    <h3 class="card-title">Statistik Pengisian</h3>
    <a href="javascript:void(0);">View Report</a>
    </div>
    </div>
    <div class="card-body">
    <div class="d-flex">
    <p class="d-flex flex-column">
    <span class="text-bold text-lg">10</span>
    <span>Total KPI input</span>
    </p>
    <p class="ml-auto d-flex flex-column text-right">
    <span class="text-bold text-lg">2</span>
    <span class="text-muted">Total KPI Input terakhir</span>
    </p>
    </div>

    <div class="position-relative mb-4">
    <canvas id="sales-chart" height="200"></canvas>
    </div>
    </div>
    </div>

    <div class="card">
    <div class="card-header border-0">
    <h3 class="card-title">Cabang Terburuk</h3>
    <div class="card-tools">
    <a href="#" class="btn btn-sm btn-tool">
    <i class="fas fa-download"></i>
    </a>
    <a href="#" class="btn btn-sm btn-tool">
    <i class="fas fa-bars"></i>
    </a>
     </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
        <th>Nama Cabang</th>
        <th>Nilai KPI</th>
        <th>KPI Terburuk</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>
        Tunas Toyota A
        </td>
        <td>A</td>
        <td>
        Sales
        </td>
        </tr>
        <tr>
        <td>
        Tunas Toyota B
        </td>
        <td>A</td>
        <td>
        Aftersales
        </td>
        </tr>
        <tr>
        <td>
        Tunas Toyota C
        </td>
        <td>B</td>
        <td>
        Sales
        </td>
        </tr>
        <tr>
        <td>
        Tunas Toyota D
        </td>
        <td>B</td>
        <td>
        Sales
        </td>
        </tr>
        </tbody>
        </table>

    </div>
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
    <script> $(function(){'use strict'
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
      backgroundColor: ['green', 'yellow', 'orange', 'red'],
      borderWidth: 2
    }]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: 'Gauge chart KPI Tunas Toyota'
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
