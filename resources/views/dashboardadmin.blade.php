
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
        <title>TTSP - Tunas Toyota Sales Pocket</title>
        <link rel="stylesheet" type="text/css" href="styles/bootstrapp2.css">
        <link rel="stylesheet" type="text/css" href="styles/style3.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
        <link rel="manifest" href="_manifest.json">
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
        <div class="card card-style">
            <div class="content mb-0">
                <h3>Filter Dashboard</h3>
                <div class="content">
                    <form id="sample_form">
                    @csrf
                        <fieldset>
                            <div class="form-field form-name">
                                <label class="contactNameField color-theme" for="contactNameField">Periode:<span>(required)</span></label>
                                <input type="month" class="form-control validate-text" id="periode_search" name="periode_search" value="{{ date('Y-m') }}" placeholder="Phone">
                            </div>
                            @if(auth::id() ==  1 || auth::id() == 3)
                            <div class="form-field form-email">
                                <label class="contactEmailField color-theme" for="contactEmailField">Supervisor:<span>(required)</span></label>
                                <div class="input-style has-borders no-icon mb-4">
                                    <select id="spv_search" name="spv_search">
                                        <option value="" disabled selected>Semua Supervisor</option>
                                        @foreach ($dataspv as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }} - {{ $a->lokasi }}</option>
                                        @endforeach
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
		<div class="content mt-0">
			<div class="row">
				<div class="col-3 pe-2">
					<div class="card card-style gradient-blue m-0" data-card-height="130">
						<div class="card-top p-3">
						</div>
						<div class="card-bottom p-3">
							<h4 class="color-white font-14 opacity-50 mb-0">Sales Login</h4>
							{{-- <h1 class="color-white mb-n1">{{ $blmlog }}</h1> --}}
							<h1 class="load color-white mb-n1" id="saleslogin"></h1>
						</div>
					</div>
				</div>
				<div class="col-3 ps-2">
					<div class="card card-style gradient-green mx-0 m-0" data-card-height="130">
						<div class="card-top p-3">
						</div>
						<div class="card-bottom p-3">
							<h4 class="color-white font-14 opacity-50 mb-0">Sales Belum Login</h4>
							{{-- <h1 class="color-white mb-n1">{{ $totuser-$blmlog }}</h1> --}}
							<h1 class="load color-white mb-n1" id="salesbelumlogin"></h1>
						</div>
					</div>
				</div>
                <div class="col-3 ps-2">
                    <div class="card card-style mx-0 mb-2 p-3">
                        <h6 class="font-14">Paling Sering Dikunjungi</h6>
                        <br>
                        <h5 class="load color-green-dark mb-0" id="seringdikunjungi"></h5>
                        <br>
                    </div>
                </div>
                <div class="col-3 ps-2">
                    <div class="card card-style mx-0 mb-2 p-3">
                        <h6 class="font-14">Paling jarang Dikunjungi</h6>
                        <br>
                        <h5 class="load color-green-dark mb-0" id="jarangdikunjungi"></h5>
                        <br>
                    </div>
                </div>
			</div>
		</div>

        <div class="content mt-0 mb-0">
            <div class="row mb-0">
                <div class="col-12">
                    <div class="card mx-0 card-style" data-card-height="400">
                        <div class="content">
                            <h5 class="font-14 opacity-50">Site Visit Detail</h5>
                            <div class="divider mb-3" id="sitevisit">
                            </div>
                        </div>
                    </div>
                </div>
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
        <script type="text/javascript" src="scripts/custom.js"></script>
        <script type="text/javascript" src="scripts/charts.js"></script>
        <script>
            $(document).ready(function(){
                var dashboardChart = document.getElementById('dashboard-chart2')

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
                $(document).on('click', '#filter_button', function(){
                    console.log('filter')
                    var periode = document.getElementById("periode_search").value;
                    var spv = document.getElementById("spv_search").value;
                    if(spv == null)
                    {
                        var periodes = periode;
                    }
                    else
                    {
                        var periodes = periode + '/' + spv;
                    }
                    console.log(periodes)
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
                        $('#seringdikunjungi').html(html.dikunjungi.menu);
                        $('#jarangdikunjungi').html(html.jarang.menu);
                        const isivisit = [];
                        html.visit.forEach(x => isivisit.push('<div class="mb-4"><h5>' + x.menu + '<span class="opacity-30 float-end">' + x.hitung + '</span></h5></div>'));
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
                    $('#seringdikunjungi').html(html.dikunjungi.menu);
                    $('#jarangdikunjungi').html(html.jarang.menu);
                    const isivisit = [];
                    html.visit.forEach(x => isivisit.push('<div class="mb-4"><h5>' + x.menu + '<span class="opacity-30 float-end">' + x.hitung + '</span></h5></div>'));
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
