@extends('adminlte::page')

@section('title', 'Dashboard GR')

@section('content_header')
    <h1>Dashboard GR</h1>
@stop

@section('content')
<div class="preloader flex-column justify-content-center align-items-center">


    <img src="pictures/tcm_new.png"
         class="animation__shake"
         alt="Preloader Image"
         width="400"
         height="400">

</div>
<form action="dashboardgr" method="get">
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
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary">
                Supporting KPI of GP Service GR Ratio
            </div>
            <div class="card-body table-responsive">
                <table width="100%">
                    <tr>
                        <td>a. Awareness Rate: T-Care.</td>
                        <td><div id="chart4"></div></td>
                    </tr>
                    <tr>
                        <td>b. Awareness Rate: T-intouh</td>
                        <td><div id="chart5"></div></td>
                    </tr>
                    <tr>
                        <td>c. Awareness Rate: Insurance</td>
                        <td><div id="chart6"></div></td>
                    </tr>
                    <tr>
                        <td>a. 1st Service T-care Lite Rate (LCGC)</td>
                        <td><div id="chart7"></div></td>
                    </tr>
                    <tr>
                        <td>b. 1st Service T-care Rate (non LCGC)</td>
                        <td><div id="chart8"></div></td>
                    </tr>
                    <tr>
                        <td>c. PM Rate T-Care Lite 2nd Service (LCGC)</td>
                        <td><div id="chart9"></div></td>
                    </tr>
                    <tr>
                        <td>d. PM Rate T-Care 2nd-3rd Service (Non LCGC)</td>
                        <td><div id="chart10"></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary">
                Supporting KPI of GP Service GR Ratio & GP Parts GR Ratio
            </div>
            <div class="card-body table-responsive">
                <table width="100%">
                    <tr>
                        <td>a. Survey Customer Interest: T-Care</td>
                        <td><div id="chart11"></div></td>
                    </tr>
                    <tr>
                        <td>b. Survey Customer Interest: T-Intouch</td>
                        <td><div id="chart12"></div></td>
                    </tr>
                    <tr>
                        <td>Aftersales (Overall productivity)</td>
                        <td><div id="chart13"></div></td>
                    </tr>
                    <tr>
                        <td>Up Selling ratio  (TMO)</td>
                        <td><div id="chart14"></div></td>
                    </tr>
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
            data: [{{ $kpires->target1.",".$kpires->target1.",".$kpires->target1.",".$kpires->target1.",".$kpires->target1.",".$kpires->target1.",".$kpires->target1.",".$kpires->target1.",".$kpires->target1.",".$kpires->target1.",".$kpires->target1.",".$kpires->target1 }}]
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
        series: [{
            name: 'Target',
            data: [{{ $kpires->target20.",".$kpires->target20.",".$kpires->target20.",".$kpires->target20.",".$kpires->target20.",".$kpires->target20.",".$kpires->target20.",".$kpires->target20.",".$kpires->target20.",".$kpires->target20.",".$kpires->target20.",".$kpires->target20 }}]
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
        series: [{
            name: 'Target',
            data: [{{ $kpires->target21.",".$kpires->target21.",".$kpires->target21.",".$kpires->target21.",".$kpires->target21.",".$kpires->target21.",".$kpires->target21.",".$kpires->target21.",".$kpires->target21.",".$kpires->target21.",".$kpires->target21.",".$kpires->target21 }}]
        },{
            name: 'Actual',
            data: [{{ $data5->c41.",".$data5->c42.",".$data5->c43.",".$data5->c44.",".$data5->c45.",".$data5->c46.",".$data5->c47.",".$data5->c48.",".$data5->c49.",".$data5->c410.",".$data5->c411.",".$data5->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options6 = {
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
            data: [{{ $kpires->target22.",".$kpires->target22.",".$kpires->target22.",".$kpires->target22.",".$kpires->target22.",".$kpires->target22.",".$kpires->target22.",".$kpires->target22.",".$kpires->target22.",".$kpires->target22.",".$kpires->target22.",".$kpires->target22 }}]
        },{
            name: 'Actual',
            data: [{{ $data6->c41.",".$data6->c42.",".$data6->c43.",".$data6->c44.",".$data6->c45.",".$data6->c46.",".$data6->c47.",".$data6->c48.",".$data6->c49.",".$data6->c410.",".$data6->c411.",".$data6->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options7 = {
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
            data: [{{ $kpires->target28.",".$kpires->target28.",".$kpires->target28.",".$kpires->target28.",".$kpires->target28.",".$kpires->target28.",".$kpires->target28.",".$kpires->target28.",".$kpires->target28.",".$kpires->target28.",".$kpires->target28.",".$kpires->target28 }}]
        },{
            name: 'Actual',
            data: [{{ $data7->c41.",".$data7->c42.",".$data7->c43.",".$data7->c44.",".$data7->c45.",".$data7->c46.",".$data7->c47.",".$data7->c48.",".$data7->c49.",".$data7->c410.",".$data7->c411.",".$data7->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options8 = {
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
            data: [{{ $kpires->target29.",".$kpires->target29.",".$kpires->target29.",".$kpires->target29.",".$kpires->target29.",".$kpires->target29.",".$kpires->target29.",".$kpires->target29.",".$kpires->target29.",".$kpires->target29.",".$kpires->target29.",".$kpires->target29 }}]
        },{
            name: 'Actual',
            data: [{{ $data8->c41.",".$data8->c42.",".$data8->c43.",".$data8->c44.",".$data8->c45.",".$data8->c46.",".$data8->c47.",".$data8->c48.",".$data8->c49.",".$data8->c410.",".$data8->c411.",".$data8->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options9 = {
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
            data: [{{ $kpires->target30.",".$kpires->target30.",".$kpires->target30.",".$kpires->target30.",".$kpires->target30.",".$kpires->target30.",".$kpires->target30.",".$kpires->target30.",".$kpires->target30.",".$kpires->target30.",".$kpires->target30.",".$kpires->target30 }}]
        },{
            name: 'Actual',
            data: [{{ $data9->c41.",".$data9->c42.",".$data9->c43.",".$data9->c44.",".$data9->c45.",".$data9->c46.",".$data9->c47.",".$data9->c48.",".$data9->c49.",".$data9->c410.",".$data9->c411.",".$data9->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options10 = {
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
            data: [{{ $kpires->target31.",".$kpires->target31.",".$kpires->target31.",".$kpires->target31.",".$kpires->target31.",".$kpires->target31.",".$kpires->target31.",".$kpires->target31.",".$kpires->target31.",".$kpires->target31.",".$kpires->target31.",".$kpires->target31 }}]
        },{
            name: 'Actual',
            data: [{{ $data10->c41.",".$data10->c42.",".$data10->c43.",".$data10->c44.",".$data10->c45.",".$data10->c46.",".$data10->c47.",".$data10->c48.",".$data10->c49.",".$data10->c410.",".$data10->c411.",".$data10->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options11 = {
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
            data: [{{ $kpires->target23.",".$kpires->target23.",".$kpires->target23.",".$kpires->target23.",".$kpires->target23.",".$kpires->target23.",".$kpires->target23.",".$kpires->target23.",".$kpires->target23.",".$kpires->target23.",".$kpires->target23.",".$kpires->target23 }}]
        },{
            name: 'Actual',
            data: [{{ $data11->c41.",".$data11->c42.",".$data11->c43.",".$data11->c44.",".$data11->c45.",".$data11->c46.",".$data11->c47.",".$data11->c48.",".$data11->c49.",".$data11->c410.",".$data11->c411.",".$data11->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options12 = {
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
            data: [{{ $kpires->target24.",".$kpires->target24.",".$kpires->target24.",".$kpires->target24.",".$kpires->target24.",".$kpires->target24.",".$kpires->target24.",".$kpires->target24.",".$kpires->target24.",".$kpires->target24.",".$kpires->target24.",".$kpires->target24 }}]
        },{
            name: 'Actual',
            data: [{{ $data12->c41.",".$data12->c42.",".$data12->c43.",".$data12->c44.",".$data12->c45.",".$data12->c46.",".$data12->c47.",".$data12->c48.",".$data12->c49.",".$data12->c410.",".$data12->c411.",".$data12->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options13 = {
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
            name: 'N-1',
            data: [{{ $kpires->target51.",".$kpires->target51.",".$kpires->target51.",".$kpires->target51.",".$kpires->target51.",".$kpires->target51.",".$kpires->target51.",".$kpires->target51.",".$kpires->target51.",".$kpires->target51.",".$kpires->target51.",".$kpires->target51 }}]
        },{
            name: 'N',
            data: [{{ $data13->c41.",".$data13->c42.",".$data13->c43.",".$data13->c44.",".$data13->c45.",".$data13->c46.",".$data13->c47.",".$data13->c48.",".$data13->c49.",".$data13->c410.",".$data13->c411.",".$data13->c412 }}]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"]
        }
    }
    var options14 = {
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
            data: [{{ $kpires->target43.",".$kpires->target43.",".$kpires->target43.",".$kpires->target43.",".$kpires->target43.",".$kpires->target43.",".$kpires->target43.",".$kpires->target43.",".$kpires->target43.",".$kpires->target43.",".$kpires->target43.",".$kpires->target43 }}]
        },{
            name: 'Actual',
            data: [{{ $data14->c41.",".$data14->c42.",".$data14->c43.",".$data14->c44.",".$data14->c45.",".$data14->c46.",".$data14->c47.",".$data14->c48.",".$data14->c49.",".$data14->c410.",".$data14->c411.",".$data14->c412 }}]
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
    var chart6 = new ApexCharts(document.querySelector("#chart6"), options6);
    var chart7 = new ApexCharts(document.querySelector("#chart7"), options7);
    var chart8 = new ApexCharts(document.querySelector("#chart8"), options8);
    var chart9 = new ApexCharts(document.querySelector("#chart9"), options9);
    var chart10 = new ApexCharts(document.querySelector("#chart10"), options10);
    var chart11 = new ApexCharts(document.querySelector("#chart11"), options11);
    var chart12 = new ApexCharts(document.querySelector("#chart12"), options12);
    var chart13 = new ApexCharts(document.querySelector("#chart13"), options13);
    var chart14 = new ApexCharts(document.querySelector("#chart14"), options14);
    var chart15 = new ApexCharts(document.querySelector("#chart15"), options15);
    var chart16 = new ApexCharts(document.querySelector("#chart16"), options16);

    chart.render();
    chart2.render();
    chart3.render();
    chart4.render();
    chart5.render();
    chart6.render();
    chart7.render();
    chart8.render();
    chart9.render();
    chart10.render();
    chart11.render();
    chart12.render();
    chart13.render();
    chart14.render();
    chart15.render();
    chart16.render();
</script>
@endif
@stop
