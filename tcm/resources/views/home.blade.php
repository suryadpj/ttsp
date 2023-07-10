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
<h3>{{ count($hitunginput) }}</h3>
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
<h3>@php echo $kantor-count($hitunginput); @endphp</h3>
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
        <th>Periode</th>
        <th>KPI Resource</th>
        <th>Final Grade</th>
        <th>KPI Proses</th>
        <th>Final Grade</th>
        <th>Result</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($datakantor as $a)
            <tr>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->bulan }}</td>
                <td>{{ $a->kpiresource }}%</td>
                @if($a->kpiresource >= 60 && $a->kpiproses >= 40)
                    <td>
                        <h2><span class="badge badge-success">High</span></h2>
                    </td>
                @elseif($a->kpiresource >= 60 && $a->kpiproses < 40)
                    <td>
                        <h2><span class="badge badge-warning">Medium</span></h2>
                    </td>
                @elseif($a->kpiresource < 60 && $a->kpiproses >= 40)
                    <td>
                        <h2><span class="badge badge-warning">Medium</span></h2>
                    </td>
                @elseif($a->kpiresource < 60 && $a->kpiproses < 40)
                    <td>
                        <h2><span class="badge badge-danger">Low</span></h2>
                    </td>
                @endif
                <td>{{ round($a->kpiproses) }}%</td>
                    @if($a->kpiresource >= 60 && $a->kpiproses >= 40)
                        <td>
                            <h2><span class="badge badge-success">High</span></h2>
                        </td>
                    @elseif($a->kpiresource >= 60 && $a->kpiproses < 40)
                        <td>
                            <h2><span class="badge badge-warning">Medium</span></h2>
                        </td>
                    @elseif($a->kpiresource < 60 && $a->kpiproses >= 40)
                        <td>
                            <h2><span class="badge badge-warning">Medium</span></h2>
                        </td>
                    @elseif($a->kpiresource < 60 && $a->kpiproses < 40)
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://unpkg.com/chartjs-gauge@0.3.0/dist/chartjs-gauge.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script src="https://raw.githubusercontent.com/emn178/chartjs-plugin-labels/master/src/chartjs-plugin-labels.js"></script>
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
        var salesChart=new Chart($salesChart,{type:'bar',data:{labels:['JAN','FEB','MAR','APR','MEY','JUN','JUL','AUG','SEP','OCT','NOV','DEC','TARGET'],datasets:[{backgroundColor:'#007bff',borderColor:'#007bff',data:[{{ $chartinput->jan.",".$chartinput->feb.",".$chartinput->mar.",".$chartinput->apr.",".$chartinput->mei.",".$chartinput->jun.",".$chartinput->jul.",".$chartinput->aug.",".$chartinput->sep.",".$chartinput->okt.",".$chartinput->nov.",".$chartinput->des.",100" }}]}]},options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,callback:function(value){if(value>=1000){value/=1000
        }
        return value+'%'}},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})
        var $visitorsChart=$('#visitors-chart')
        var visitorsChart=new Chart($visitorsChart,{data:{labels:['18th','20th','22nd','24th','26th','28th','30th'],datasets:[{type:'line',data:[100,120,170,167,180,177,160],backgroundColor:'transparent',borderColor:'#007bff',pointBorderColor:'#007bff',pointBackgroundColor:'#007bff',fill:false},{type:'line',data:[60,80,70,67,80,77,100],backgroundColor:'tansparent',borderColor:'#ced4da',pointBorderColor:'#ced4da',pointBackgroundColor:'#ced4da',fill:false}]},options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,suggestedMax:200},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})});
        var randomScalingFactor = function() {
  return Math.round(Math.random() * 100);
};

var data = [40, 76, 100];
var value = 40;

var config = {
  type: "gauge",
  data: {
    labels: ["Low", "Medium", "Well"],
    datasets: [
      {
        label: "TCM",
        data: data,
        value: value,
        minValue: 0,
        backgroundColor: ["red", "orange", "green"],
        borderWidth: 2
      }
    ]
  },
  options: {
    legend: {
      display: true,
      position: "bottom",
      labels: {
        generateLabels: {}
      }
    },
    responsive: true,
    title: {
      display: true,
      text: "Gauge chart Parameter TCM"
    },
    layout: {
      padding: {
        bottom: 20
      }
    },
    needle: {
      radiusPercentage: 1,
      widthPercentage: 1,
      lengthPercentage: 60,
      color: "rgba(0, 0, 0, 1)"
    },
    valueLabel: {
      fontSize: 12,
    },
    plugins: {
      datalabels: {
        display: "auto",
        formatter: function (value, context) {
          // debugger;
          return context.chart.data.labels[context.dataIndex];
          // return context.dataIndex===0?'Normal':context.dataIndex===1?'Warning':'Critical';
          // return '< ' + Math.round(value);
        },
        color: function (context) {
          return "white";
        },
        //color: 'rgba(255, 255, 255, 1.0)',
        // backgroundColor: 'rgba(0, 0, 0, 1.0)',
        // borderWidth: 0,
        // borderRadius: 5,
        font: function (context) {
          var innerRadius = Math.round(context.chart.innerRadius);
          console.log(innerRadius);
          var size = Math.round(innerRadius / 8);

          return {
            weight: "normal",
            size: size
          };
        }
        // font: {
        //   weight: 'normal',
        //   size:16
        // }
      }
    }
  }
};

window.onload = function() {
  var ctx = document.getElementById('chart').getContext('2d');
  window.myGauge = new Chart(ctx, config);
  myGauge.update();
    const val = setTimeout(() => console.log(myGauge.toBase64Image()), 800);

};

    </script>
@stop
