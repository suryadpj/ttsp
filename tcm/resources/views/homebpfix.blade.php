@extends('adminlte::page')

@section('title', 'Dashboard BP')

@section('content_header')
    <h1>Dashboard BP</h1>
@stop

@section('content')
<div class="preloader flex-column justify-content-center align-items-center">


    <img src="pictures/tcm_new.png"
         class="animation__shake"
         alt="Preloader Image"
         width="400"
         height="400">

</div>
<form action="dashboardbp" method="get">
    <input type="hidden" name="proses" value="1">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    Silahkan cari cabang yang ingin anda lihat :
                </div>
                <div class="card-body">
                    @if (old('success'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ old('success') }}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                            <select class="form-control select2 @if(old('kantorempty')) is-invalid @endif" name="search_kantor" id="search_kantor"  style="width: 100%;">
                                <option value=''>Pilih Kantor</option>
                                @foreach($kantor as $p)
                                    <option value="{{ $p->id }}" @if(old('fkantor') == $p->id || $fkantor == $p->id) selected @endif>{{ $p->nama }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit" id="filter_button" class="btn btn-primary percent"><i class="fas fa-search"></i></button>
                                <button type="button" id="reset_filter_button" class="btn percent"><i class="fas fa-undo"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<hr>

@if($report == 1)
@php $no = 1; $total = 0; @endphp
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>Mei</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Okt</th>
                                <th>Nov</th>
                                <th>Des</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>KPI Achive</td>
                                <td>{{ $data1->achieve1 }}</td>
                                <td>{{ $data1->achieve2 }}</td>
                                <td>{{ $data1->achieve3 }}</td>
                                <td>{{ $data1->achieve4 }}</td>
                                <td>{{ $data1->achieve5 }}</td>
                                <td>{{ $data1->achieve6 }}</td>
                                <td>{{ $data1->achieve7 }}</td>
                                <td>{{ $data1->achieve8 }}</td>
                                <td>{{ $data1->achieve9 }}</td>
                                <td>{{ $data1->achieve10 }}</td>
                                <td>{{ $data1->achieve11 }}</td>
                                <td>{{ $data1->achieve12 }}</td>
                            </tr>
                            <tr>
                                <td>KPI Growth</td>
                                <td>{{ $data1->growth1 }}</td>
                                <td>{{ $data1->growth2 }}</td>
                                <td>{{ $data1->growth3 }}</td>
                                <td>{{ $data1->growth4 }}</td>
                                <td>{{ $data1->growth5 }}</td>
                                <td>{{ $data1->growth6 }}</td>
                                <td>{{ $data1->growth7 }}</td>
                                <td>{{ $data1->growth8 }}</td>
                                <td>{{ $data1->growth9 }}</td>
                                <td>{{ $data1->growth10 }}</td>
                                <td>{{ $data1->growth11 }}</td>
                                <td>{{ $data1->growth12 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0 bg-primary">
                <h3 class="card-title">1. Customer Satisfaction</h3>
            </div>
            <div class="card-body">
                <div id="chart1"></div>
                {{-- <canvas id="myChart" width="200" height="50"></canvas> --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-0 bg-primary">
                <h3 class="card-title">Supporting KPI of NPS</h3>
            </div>
            <div class="card-body">
                <div id="chart4"></div>
                {{-- <canvas id="myChart" width="200" height="50"></canvas> --}}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-0 bg-primary">
                &nbsp;
            </div>
            <div class="card-body">
                <div id="chart5"></div>
                {{-- <canvas id="myChart" width="200" height="50"></canvas> --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-0 bg-primary">
                <h3 class="card-title">2. Business</h3>
            </div>
            <div class="card-body">
                <div id="chart2"></div>
                {{-- <canvas id="myChart" width="200" height="50"></canvas> --}}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-0 bg-primary">
                &nbsp;
            </div>
            <div class="card-body">
                <div id="chart3"></div>
                {{-- <canvas id="myChart" width="200" height="50"></canvas> --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                Stepping KPI - Cross Selling ratio
            </div>
            <div class="card-body table-responsive">
                <table width="100%">
                    <tr>
                        <td>Cross Selling ratio (include BP) Battery</td>
                        <td><div id="chart15"></div></td>
                    </tr>
                    <tr>
                        <td>Cross Selling ratio (include BP) Tire</td>
                        <td><div id="chart16"></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }.verticalTableHeader {
    text-align:center;
    white-space:nowrap;
    transform-origin:50% 50%;
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    transform: rotate(90deg);

}
.verticalTableHeader:before {
    content:'';
    padding-top:110%;/* takes width as reference, + 10% for faking some extra padding */
    display:inline-block;
    vertical-align:middle;
}

    </style>
@stop

@section('js')
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>
@if($report == 1)
<script src="vendor/apexjs/apexcharts.min.js"></script>
<script>
    var options = {
        chart: {
            type: 'line',
            width: "100%",
            height: "200%",
        },
        responsive: [{
            breakpoint: undefined,
            options: {},
        }],
        dataLabels: {
          enabled: true,
        },
        series: [{
            name: 'Target',
            data: [{{ $kpires->target27.",".$kpires->target27.",".$kpires->target27.",".$kpires->target27.",".$kpires->target27.",".$kpires->target27.",".$kpires->target27.",".$kpires->target27.",".$kpires->target27.",".$kpires->target27.",".$kpires->target27.",".$kpires->target27 }}]
        },{
            name: 'KPI Skor',
            data: [{{ $data2->nps1.",".$data2->nps2.",".$data2->nps3.",".$data2->nps4.",".$data2->nps5.",".$data2->nps6.",".$data2->nps7.",".$data2->nps8.",".$data2->nps9.",".$data2->nps10.",".$data2->nps11.",".$data2->nps12 }}]
        }],
        xaxis: {
            categories: ["January", "February", "March", "April", "May", "June", "July", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options2 = {
        chart: {
            type: 'line',
            width: "100%",
            height: "200%",
        },
        responsive: [{
            breakpoint: undefined,
            options: {},
        }],
        title: {
          text: 'Revenue',
          align: 'center'
        },
        dataLabels: {
          enabled: true,
        },
        series: [{
            name: 'Total Revenue per Unit (Veh + TCO) (mio)',
            data: [{{ $data3->c2a1.",".$data3->c2a2.",".$data3->c2a3.",".$data3->c2a4.",".$data3->c2a5.",".$data3->c2a6.",".$data3->c2a7.",".$data3->c2a8.",".$data3->c2a9.",".$data3->c2a10.",".$data3->c2a11.",".$data3->c2a12.",".$data3->c2a12 }}]
        },{
            name: 'Total Revenue Amount (Veh + TCO) (mio)',
            data: [{{ $data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b11.",".$data4->c2b12.",".$data4->c2b12 }}]
        }],
        xaxis: {
            categories: ["January", "February", "March", "April", "May", "June", "July", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options3 = {
        chart: {
            type: 'line',
            width: "100%",
            height: "200%",
            stacked: true,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        responsive: [{
            breakpoint: undefined,
            options: {},
        }],
        title: {
          text: 'Gross Profit',
          align: 'center'
        },
        dataLabels: {
          enabled: true,
        },
        series: [{
            name: 'Total Revenue per Unit (Veh + TCO) (mio)',
            data: [{{ $data3->c2a1.",".$data3->c2a2.",".$data3->c2a3.",".$data3->c2a4.",".$data3->c2a5.",".$data3->c2a6.",".$data3->c2a7.",".$data3->c2a8.",".$data3->c2a9.",".$data3->c2a10.",".$data3->c2a11.",".$data3->c2a12.",".$data3->c2a12 }}]
        },{
            name: 'Total Revenue Amount (Veh + TCO) (mio)',
            data: [{{ $data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b1.",".$data4->c2b11.",".$data4->c2b12.",".$data4->c2b12 }}]
        }],
        xaxis: {
            categories: ["January", "February", "March", "April", "May", "June", "July", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options4 = {
        chart: {
            type: 'line',
            width: "100%",
            height: "100%",
            toolbar : false
        },
        responsive: [{
            breakpoint: undefined,
            options: {},
        }],
        title: {
          text: 'OTD',
          align: 'center'
        },
        series: [{
            name: 'Target',
            data: [{{ $kpires->target47.",".$kpires->target47.",".$kpires->target47.",".$kpires->target47.",".$kpires->target47.",".$kpires->target47.",".$kpires->target47.",".$kpires->target47.",".$kpires->target47.",".$kpires->target47.",".$kpires->target47.",".$kpires->target47 }}]
        },{
            name: 'Actual',
            data: [{{ $data44->c41.",".$data44->c42.",".$data44->c43.",".$data44->c44.",".$data44->c45.",".$data44->c46.",".$data44->c47.",".$data44->c48.",".$data44->c49.",".$data44->c410.",".$data44->c411.",".$data44->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options5 = {
        chart: {
            type: 'line',
            width: "100%",
            height: "100%",
            toolbar : false
        },
        responsive: [{
            breakpoint: undefined,
            options: {},
        }],
        title: {
          text: 'RTJ',
          align: 'center'
        },
        series: [{
            name: 'Target',
            data: [{{ $kpires->target48.",".$kpires->target48.",".$kpires->target48.",".$kpires->target48.",".$kpires->target48.",".$kpires->target48.",".$kpires->target48.",".$kpires->target48.",".$kpires->target48.",".$kpires->target48.",".$kpires->target48.",".$kpires->target48 }}]
        },{
            name: 'Actual',
            data: [{{ $data5->c41.",".$data5->c42.",".$data5->c43.",".$data5->c44.",".$data5->c45.",".$data5->c46.",".$data5->c47.",".$data5->c48.",".$data5->c49.",".$data5->c410.",".$data5->c411.",".$data5->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options15 = {
        chart: {
            type: 'line',
            width: "100%",
            height: "100%",
            toolbar : false
        },
        responsive: [{
            breakpoint: undefined,
            options: {},
        }],
        series: [{
            name: 'Target',
            data: [{{ $kpires->target44.",".$kpires->target44.",".$kpires->target44.",".$kpires->target44.",".$kpires->target44.",".$kpires->target44.",".$kpires->target44.",".$kpires->target44.",".$kpires->target44.",".$kpires->target44.",".$kpires->target44.",".$kpires->target44 }}]
        },{
            name: 'Actual',
            data: [{{ $data15->c41.",".$data15->c42.",".$data15->c43.",".$data15->c44.",".$data15->c45.",".$data15->c46.",".$data15->c47.",".$data15->c48.",".$data15->c49.",".$data15->c410.",".$data15->c411.",".$data15->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options16 = {
        chart: {
            type: 'line',
            width: "100%",
            height: "100%",
            toolbar : false
        },
        responsive: [{
            breakpoint: undefined,
            options: {},
        }],
        series: [{
            name: 'Target',
            data: [{{ $kpires->target46.",".$kpires->target46.",".$kpires->target46.",".$kpires->target46.",".$kpires->target46.",".$kpires->target46.",".$kpires->target46.",".$kpires->target46.",".$kpires->target46.",".$kpires->target46.",".$kpires->target46.",".$kpires->target46 }}]
        },{
            name: 'Actual',
            data: [{{ $data16->c41.",".$data16->c42.",".$data16->c43.",".$data16->c44.",".$data16->c45.",".$data16->c46.",".$data16->c47.",".$data16->c48.",".$data16->c49.",".$data16->c410.",".$data16->c411.",".$data16->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
    var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
    var chart4 = new ApexCharts(document.querySelector("#chart4"), options4);
    var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
    var chart15 = new ApexCharts(document.querySelector("#chart15"), options15);
    var chart16 = new ApexCharts(document.querySelector("#chart16"), options16);

    chart.render();
    chart2.render();
    chart3.render();
    chart4.render();
    chart5.render();
    chart15.render();
    chart16.render();
</script>
@endif
@stop
