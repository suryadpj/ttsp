
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
        <title>TTSP - Tunas Toyota Sales Pocket</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <link rel="stylesheet" type="text/css" href="styles/style3.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
        <link rel="manifest" href="mockup/_manifest.json">
        <link rel="apple-touch-icon" sizes="180x180" href="app/icons/logo_tunas.png">
        <link rel="icon" href="app/icons/logo_tunas.png" sizes="32x32" type="image/png">
        <link rel="icon" href="app/icons/logo_tunas.png" sizes="16x16" type="image/png">
    </head>
    <body class="theme-light" data-highlight="highlight-red">
        <div id="preloader">
            <div class="spinner-border color-highlight" role="status">
            </div>
        </div>
        <div id="page">
            <div class="header header-auto-show header-fixed header-logo-center">
                <a href="home" class="header-title">
                    <img src="images/pictures/logo-tunas.png" width="200">
                </a>
            </div>
            <div id="footer-bar" class="footer-bar-6">
                <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
                <a href="home" class="circle-nav active-nav">
                    <i class="fa fa-home"></i>
                    <span>Welcome</span>
                </a>
                <a href="logout" data-menu="menu-main"><i class="fa fa-sign-out"></i><span>Logout</span></a>
            </div>
            <div class="page-title page-title-fixed">
                <h1 style="font-size:large;">
                    Hi, {{ auth::user()->name }} | {{ date("d F Y") }}
                    <img src="images/pictures/logo_tunas.png" class="rounded-xl bg-green-dark" width="25">
                </h1>
                <a href="logout" class="page-title-icon shadow-xl bg-theme color-theme"><i class="fa fa-sign-out"></i></a>
            </div>
            <div class="page-title-clear"></div>


    <div class="page-content">
        <div class="content mb-0 mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-style mx-0 mb-2 p-3">
                        <h4>Site Visit Detail</h4>
                        <div class="content mb-2">
                            <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                                <thead>
                                    <tr class="bg-blue-dark">
                                        <th scope="col" class="color-white py-3 font-14">Nama</th>
                                        <th scope="col" class="color-white py-3 font-14">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody id="sitevisit">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-style mx-0 mb-2 p-3">
                        <h4>Filter Data</h4>
                        <form id="sample_form">
                        @csrf
                            <fieldset>
                                <div class="form-field form-name">
                                    <label class="contactNameField color-theme" for="contactNameField">Periode:<span>(required)</span></label>
                                    <input type="month" class="form-control validate-text" id="periode_search" name="periode_search" value="{{ date('Y-m') }}" placeholder="Phone">
                                </div>
                                @if(auth::id() ==  1 || auth::id() == 3)
                                <div class="form-field form-email">
                                    <label class="contactEmailField color-theme" for="contactEmailField">Lokasi:<span>(required)</span></label>
                                    <div class="input-style has-borders no-icon mb-4">
                                        <select id="lokasi_search" name="lokasi_search">
                                            <option value="all" disabled selected>Semua Lokasi</option>
                                            @foreach ($dataspv as $a)
                                            <option value="{{ $a->area }}">{{ $a->area }}</option>
                                            @endforeach
                                        </select>
                                        <span><i class="fa fa-chevron-down"></i></span>
                                        <i class="fa fa-check disabled valid color-green-dark"></i>
                                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                                        <em></em>
                                    </div>
                                </div>
                                <div class="form-field form-email">
                                    <label class="contactEmailField color-theme" for="contactEmailField">Supervisor:<span>(required)</span></label>
                                    <div class="input-style has-borders no-icon mb-4">
                                        <select id="spv_search" name="spv_search">
                                            <option value="all" disabled selected>Semua Supervisor</option>
                                        </select>
                                        <span><i class="fa fa-chevron-down"></i></span>
                                        <i class="fa fa-check disabled valid color-green-dark"></i>
                                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                                        <em></em>
                                    </div>
                                </div>
                                @else
                                <input type="hidden" id="spv_search" name="spv_search" value="">
                                @endif
                                <div class="form-button">
                                    {{-- <button type="submit" id="filter_button" class="btn btn-primary percent"><i class="fas fa-search"></i> | Cari</button> --}}
                                    <button type="button" id="filter_button" class="btn bg-highlight text-uppercase font-900 btn-m btn-full rounded-sm  shadow-xl contactSubmitButton" value="Filter">Filter</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mb-0 mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-style mx-0 mb-2 p-3" data-card-height="500">
                        <h6 class="font-14">KPI Sales Tools</h6>
                        <canvas id="pie-chart-sales" width="20" height="2">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-style mx-0 mb-2 p-3" data-card-height="500">
                        <h6 class="font-14">KPI T-intouch</h6>
                        <canvas id="pie-chart-tintouch" width="20" height="380">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-style mx-0 mb-2 p-3" data-card-height="500">
                        <h6 class="font-14">MQuote</h6>
                        <canvas id="pie-chart-mquote" width="20" height="380">
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-6 pe-1">
                    <div class="card card-style mx-0 mb-2 p-3">
                        <h6 class="font-14">Sales Login</h6>
                        <h3 class="color-green-dark mb-0" id="saleslogin">0</h3>
                    </div>
                </div>
                <div class="col-6 ps-1">
                    <div class="card card-style mx-0 mb-2 p-3">
                        <h6 class="font-14">Sales Belum Login</h6>
                        <h3 class="color-red-dark mb-0" id="salesbelumlogin">0</h3>
                    </div>
                </div>
                <div class="col-6 pe-1">
                    <div class="card card-style mx-0 p-3">
                        <h6 class="font-14">Paling Sering Dikunjungi</h6>
                        <h3 class="color-brown-dark mb-0" id="seringdikunjungi">0</h3>
                    </div>
                </div>
                <div class="col-6 ps-1">
                    <div class="card card-style mx-0 p-3">
                        <h6 class="font-14">Paling Jarang Dikunjungi</h6>
                        <h3 class="color-blue-dark mb-0" id="salesbelumlogin">0</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-0 mb-0">
            <div class="row mb-0">
                <div class="col-12">
                    <div class="card mx-0 card-style" data-card-height="500">
                        <div class="content">
                            <h5 class="font-14 opacity-50">App Visitor Statistik M-Quote <a href="#" class="float-end color-highlight"><i class="fa fa-arrow-right"></i></a></h5>
                            <div class="divider mb-3"></div>
                        </div>
                        <div class="card-center text-center">
                                <canvas id="dashboard-chart2" width="20" height="380">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-style">
            <div class="content mb-2">
                <h4>Summary Akses Sales</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-blue-dark">
                            <th scope="col" class="color-white py-3 font-14">Nama</th>
                            <th scope="col" class="color-white py-3 font-14">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="summaryakses">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-style">
            <div class="content mb-2">
                <h4>Summary Akses Sales - M-Quote</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-blue-dark">
                            <th scope="col" class="color-white py-3 font-14">Nama</th>
                            <th scope="col" class="color-white py-3 font-14">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="summarymquote">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-style">
            <div class="content mb-2">
                <h4>Summary Akses Sales - Salestool</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-blue-dark">
                            <th scope="col" class="color-white py-3 font-14">Nama</th>
                            <th scope="col" class="color-white py-3 font-14">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="summarysalestool">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-style">
            <div class="content mb-2">
                <h4>Summary Akses Sales - Promo</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-blue-dark">
                            <th scope="col" class="color-white py-3 font-14">Nama</th>
                            <th scope="col" class="color-white py-3 font-14">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="summarypromo">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-style">
            <div class="content mb-2">
                <h4>Summary Akses Sales - Digital Marketing</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-blue-dark">
                            <th scope="col" class="color-white py-3 font-14">Nama</th>
                            <th scope="col" class="color-white py-3 font-14">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="summarydigimar">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-style">
            <div class="content mb-2">
                <h4>Summary Akses Sales - Sosial Media</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-blue-dark">
                            <th scope="col" class="color-white py-3 font-14">Nama</th>
                            <th scope="col" class="color-white py-3 font-14">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="summarysosialmedia">
                    </tbody>
                </table>
            </div>
        </div>

    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="sidebar" data-menu-width="280" data-menu-active="nav-components"></div>
        </div>
        <br>
        <br>
        <br>
        <script type="text/javascript" src="scripts/jquery.js"></script>
        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/custom2.js"></script>
        <script type="text/javascript" src="scripts/charts.js"></script>
        <script>
            $(document).ready(function(){
                $("#lokasi_search").change(function()
                {
                    $(this).find("option:selected").each(function(){
                        var optionValue = $(this).attr("value");
                        console.log(optionValue)
                        if(optionValue != "")
                        {
                            $.ajax({
                            url:"dataspv/"+optionValue,
                            dataType:"json",
                            beforeSend:function(){
                                $('#spv_search').prop("disabled", true);
                                $("#spv_search option[class='tembusan']").remove();
                                $('select[name="lokasi_search"]').attr('disabled', 'disabled');
                                $('#spv_search')
                                .find('option')
                                .remove()
                                .end()
                                .append('<option value="all">Semua Supervisor</option>');
                            ;
                            },
                            success:function(html)
                            {
                                const isispv = [];
                                html.forEach(x => isispv.push('<option value="' + x.ID + '">' + x.name + '</option>'));
                                $('#spv_search').append(isispv);
                                $('#spv_search').prop("disabled", false);
                                $('#lokasi_search').prop("disabled", false);
                            }
                            });
                        }
                    });
                }).change();
                var dashboardChart = document.getElementById('dashboard-chart2')
                var pieChart = document.getElementById('pie-chart-sales')
                var pieChart2 = document.getElementById('pie-chart-tintouch')
                var pieChart3 = document.getElementById('pie-chart-mquote')

                var dashboardChart = new Chart(dashboardChart, {
                    type: 'line',
                    data: {
                    labels: [],
                    // labels: ["andri.antonio","kharismawati","sifa.fauziah","mulyano","arofah.kemal","fahrul.yusuf","novriwan.tarigan","ridho.yulia","arief.achmad","yossie.chandra","andikha.revindra","solahudin.amin","james.unggul","hermawan2","benny.adrian","mason.nicholas","muhammad.adil","rachdia.arle","ade.sulaeman","rahman.hakim","marthina.siahaan","reinhardt.parmonangan","andri.ferdian","septiani.indry","greace.adelina","joko.hadi","mahfud.madmori","saepul.bahri","umar.cholik","tuti.handayani","hikmah.anggraini","slamet.purwanto","ida.soleha","toga.maibang","yuni.suhartiningsih"],
                    datasets: [
                        {
                        label: "Sales",
                        borderColor: "#A0D468",
                        fill: "false",
                        data: []
                        // data: [32,20,10,20,10,12,3,14,15,2,2,12,5,11,10,2,0,19,17,21,14,6,16,10,0,5,18,10,0,1,29,1,4,1,8]
                        }
                    ]
                    },
                    options: {
                        responsive: true, maintainAspectRatio:false,
                        legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                        title: {display: false},
                        scaleShowValues: true,
                        scales: {
                            xAxes: [{
                            ticks: {
                                autoSkip: false,
                                maxRotation: 90,
                                minRotation: 90
                            }
                            }]
                        }
                    }
                });
                var pieChart = new Chart(pieChart, {
                    type: 'bar',
                    data: {
                    // labels: [],
                    labels: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
                    datasets: [
                        {
                        label: "Dewi Sartika",
                        backgroundColor: "blue",
                        // data: []
                        data: [93,60,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "bekasi",
                        backgroundColor: "green",
                        // data: []
                        data: [9,18,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Bintaro",
                        backgroundColor: "red",
                        // data: []
                        data: [19,8,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Pecenongan",
                        backgroundColor: "yellow",
                        // data: []
                        data: [9,3,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Tangerang",
                        backgroundColor: "black",
                        // data: []
                        data: [3,5,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Cimindi",
                        backgroundColor: "grey",
                        // data: []
                        data: [7,11,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Bandar Jaya",
                        backgroundColor: "orange",
                        // data: []
                        data: [3,2,0,0,0,0,0,0,0,0,0,0]
                        }
                    ]
                    },
                    options: {
                        responsive: true, maintainAspectRatio:false,
                        legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                        title: {display: false},
                        scaleShowValues: true,
                        scales: {
                            xAxes: [{
                            ticks: {
                                autoSkip: false,
                                maxRotation: 90,
                                minRotation: 90
                            }
                            }]
                        }
                    }
                });
                var pieChart2 = new Chart(pieChart2, {
                    type: 'bar',
                    data: {
                    // labels: [],
                    labels: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
                    datasets: [
                        {
                        label: "Dewi Sartika",
                        backgroundColor: "blue",
                        // data: []
                        data: [43,18,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "bekasi",
                        backgroundColor: "green",
                        // data: []
                        data: [9,15,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Bintaro",
                        backgroundColor: "red",
                        // data: []
                        data: [10,13,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Pecenongan",
                        backgroundColor: "yellow",
                        // data: []
                        data: [9,13,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Tangerang",
                        backgroundColor: "black",
                        // data: []
                        data: [0,5,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Cimindi",
                        backgroundColor: "grey",
                        // data: []
                        data: [12,7,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Bandar Jaya",
                        backgroundColor: "orange",
                        // data: []
                        data: [4,10,0,0,0,0,0,0,0,0,0,0]
                        }
                    ]
                    },
                    options: {
                        responsive: true, maintainAspectRatio:false,
                        legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                        title: {display: false},
                        scaleShowValues: true,
                        scales: {
                            xAxes: [{
                            ticks: {
                                autoSkip: false,
                                maxRotation: 90,
                                minRotation: 90
                            }
                            }]
                        }
                    }
                });
                var pieChart3 = new Chart(pieChart3, {
                    type: 'bar',
                    data: {
                    // labels: [],
                    labels: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
                    datasets: [
                        {
                        label: "Dewi Sartika",
                        backgroundColor: "blue",
                        // data: []
                        data: [415,275,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "bekasi",
                        backgroundColor: "green",
                        // data: []
                        data: [0,47,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Bintaro",
                        backgroundColor: "red",
                        // data: []
                        data: [1,25,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Pecenongan",
                        backgroundColor: "yellow",
                        // data: []
                        data: [4,6,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Tangerang",
                        backgroundColor: "black",
                        // data: []
                        data: [0,37,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Cimindi",
                        backgroundColor: "grey",
                        // data: []
                        data: [1,4,0,0,0,0,0,0,0,0,0,0]
                        },
                        {
                        label: "Bandar Jaya",
                        backgroundColor: "orange",
                        // data: []
                        data: [0,2,0,0,0,0,0,0,0,0,0,0]
                        }
                    ]
                    },
                    options: {
                        responsive: true, maintainAspectRatio:false,
                        legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                        title: {display: false},
                        scaleShowValues: true,
                        scales: {
                            xAxes: [{
                            ticks: {
                                autoSkip: false,
                                maxRotation: 90,
                                minRotation: 90
                            }
                            }]
                        }
                    }
                });
                $(document).on('click', '#filter_button', function(){
                    console.log('filter')
                    var periode = document.getElementById("periode_search").value;
                    var lokasi = document.getElementById("lokasi_search").value;
                    var spv = document.getElementById("spv_search").value;
                    if(spv == null && lokasi == null)
                    {
                        var periodes = periode;
                    }
                    else if(spv == null && lokasi != null)
                    {
                        var periodes = periode + '/' + lokasi + '/all';
                    }
                    else if(spv != null && lokasi != null)
                    {
                        var periodes = periode + '/' + lokasi + '/' + spv;
                    console.log(periodes)
                    }
                    else
                    {
                        var periodes = periode + '/' + spv;
                    }
                    $.ajax({
                    url:"dashboard/"+periodes,
                    dataType:"json",
                    beforeSend:function(){
                        $('#load').html('<i disable class="fa fa-spinner fa-spin"></i>');
                    },
                    success:function(html)
                    {
                        $('#saleslogin').html(html.blmlog);
                        $('#salesbelumlogin').html(html.totuser);
                        if(html.dikunjungi != null)
                        {
                            $('#seringdikunjungi').html(html.dikunjungi.menu);
                        }
                        if(html.jarang != null)
                        {
                            $('#jarangdikunjungi').html(html.jarang.menu);
                        }
                        const isivisit = [];
                        html.visit.forEach(x => isivisit.push('<tr><td>' + x.name + '</td><td>' + x.hitung + '</td></tr>'));
                        $('#sitevisit').html(isivisit);
                        const isisummary = [];
                        html.visitor.forEach(x => isisummary.push('<tr><td>' + x.name + '</td><td>' + x.hitung + '</td></tr>'));
                        $('#summaryakses').html(isisummary);
                        const mquotes = [];
                        html.mquote.forEach(aa => mquotes.push('<tr><td>' + aa.name + '</td><td>' + aa.hitung + '</td></tr>'));
                        $('#summarymquote').html(mquotes);
                        const salestools = [];
                        html.salestool.forEach(bb => salestools.push('<tr><td>' + bb.name + '</td><td>' + bb.hitung + '</td></tr>'));
                        $('#summarysalestool').html(salestools);
                        const promos = [];
                        html.promo.forEach(cc => promos.push('<tr><td>' + cc.name + '</td><td>' + cc.hitung + '</td></tr>'));
                        $('#summarypromo').html(promos);
                        const digimars = [];
                        html.digimar.forEach(dd => digimars.push('<tr><td>' + dd.name + '</td><td>' + dd.hitung + '</td></tr>'));
                        $('#summarydigimar').html(digimars);
                        const sosialmedias = [];
                        html.sosialmedia.forEach(ee => sosialmedias.push('<tr><td>' + ee.name + '</td><td>' + ee.hitung + '</td></tr>'));
                        $('#summarysosialmedia').html(sosialmedias);
                    }
                    });
                    $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "dashboardchart/" + periodes, // This is the URL to the API
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    })
                    .done(function( data ) {
                        dashboardChart.data.labels = data.label;
                        dashboardChart.data.datasets[0].data = data.data;
                        // dashboardChart.data.datasets[0].label = 'Data Pendapatan Parkir ' + area + ' Periode ' + month;
                        dashboardChart.update();
                    })
                    .fail(function() {
                        alert( "error occured" );
                    });
                });
                $.ajax({
                url:"dashboardnow",
                dataType:"json",
                beforeSend:function(){
                    $('#load').html('<i disable class="fa fa-spinner fa-spin"></i>');
                },
                success:function(html)
                {
                    $('#saleslogin').html(html.blmlog);
                    $('#salesbelumlogin').html(html.totuser);
                        if(html.dikunjungi != null)
                        {
                            $('#seringdikunjungi').html(html.dikunjungi.menu);
                        }
                        if(html.jarang != null)
                        {
                            $('#jarangdikunjungi').html(html.jarang.menu);
                        }
                    const isivisit = [];
                    html.visit.forEach(x => isivisit.push('<tr><td>' + x.name + '</td><td>' + x.hitung + '</td></tr>'));
                    $('#sitevisit').html(isivisit);
                    console.log('visitor' + isivisit)
                    const isisummary = [];
                    html.visitor.forEach(x => isisummary.push('<tr><td>' + x.name + '</td><td>' + x.hitung + '</td></tr>'));
                    $('#summaryakses').html(isisummary);
                    const mquotes = [];
                    html.mquote.forEach(aa => mquotes.push('<tr><td>' + aa.name + '</td><td>' + aa.hitung + '</td></tr>'));
                    $('#summarymquote').html(mquotes);
                    const salestools = [];
                    html.salestool.forEach(bb => salestools.push('<tr><td>' + bb.name + '</td><td>' + bb.hitung + '</td></tr>'));
                    $('#summarysalestool').html(salestools);
                    const promos = [];
                    html.promo.forEach(cc => promos.push('<tr><td>' + cc.name + '</td><td>' + cc.hitung + '</td></tr>'));
                    $('#summarypromo').html(promos);
                    const digimars = [];
                    html.digimar.forEach(dd => digimars.push('<tr><td>' + dd.name + '</td><td>' + dd.hitung + '</td></tr>'));
                    $('#summarydigimar').html(digimars);
                    const sosialmedias = [];
                    html.sosialmedia.forEach(ee => sosialmedias.push('<tr><td>' + ee.name + '</td><td>' + ee.hitung + '</td></tr>'));
                    $('#summarysosialmedia').html(sosialmedias);
                }
                });
                $.ajax({
                type: "GET",
                dataType: 'json',
                url: "dashboardchartnow", // This is the URL to the API
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                })
                .done(function( data ) {
                    dashboardChart.data.labels = data.label;
                    dashboardChart.data.datasets[0].data = data.data;
                    // dashboardChart.data.datasets[0].label = 'Data Pendapatan Parkir ' + area + ' Periode ' + month;
                    dashboardChart.update();
                })
                .fail(function() {
                    alert( "error occured" );
                });
            }
        );


        </script>
    </body>
</html>
