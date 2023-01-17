
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
		<div class="content mt-0">
			<div class="row mb-0">
				<div class="col-6 pe-2">
					<div class="card card-style gradient-blue m-0" data-card-height="130">
						<div class="card-top p-3">
						</div>
						<div class="card-bottom p-3">
							<h4 class="color-white font-14 opacity-50 mb-0">Sales Login</h4>
							<h1 class="color-white mb-n1">{{ $blmlog }}</h1>
						</div>
					</div>
				</div>
				<div class="col-6 ps-2">
					<div class="card card-style gradient-green mx-0 m-0" data-card-height="130">
						<div class="card-top p-3">
						</div>
						<div class="card-bottom p-3">
							<h4 class="color-white font-14 opacity-50 mb-0">Sales Belum Login</h4>
							<h1 class="color-white mb-n1">{{ $totuser-$blmlog }}</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

        <div class="content mb-0 mt-3">
            <div class="row mb-0">
                <div class="col-6 pe-1">
                    <div class="card card-style mx-0 mb-2 p-3">
                        <h6 class="font-14">Paling Sering Dikunjungi</h6>
                        <h5 class="color-green-dark mb-0">{{ $dikunjungi->menu }}</h5>
                    </div>
                </div>
                <div class="col-6 ps-1">
                    <div class="card card-style mx-0 mb-2 p-3">
                        <h6 class="font-14">Paling jarang Dikunjungi</h6>
                        <h5 class="color-red-dark mb-0">{{ $jarang->menu }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-0 mb-0">
            <div class="row mb-0">
                <div class="col-6">
                    <div class="card mx-0 card-style" data-card-height="260">
                        <div class="content">
                            <h5 class="font-14 opacity-50">Site Visit Detail</h5>
                            <div class="divider mb-3"></div>
                            @foreach ($visit as $a)
                                <div class="mb-4">
                                    <h5>{{ $a->menu }}<span class="opacity-30 float-end">{{ $a->hitung }}</span></h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card mx-0 card-style" data-card-height="260">
                        <div class="content">
                            <h5 class="font-14 opacity-50">App Visitor Statistik <a href="#" class="float-end color-highlight"><i class="fa fa-arrow-right"></i></a></h5>
                            <div class="divider mb-3"></div>
                        </div>
                        <br>
                        <div class="card-center text-center pb-4">
                                <canvas class="dashboard-chart" id="dashboard-chart"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="sidebar" data-menu-width="280" data-menu-active="nav-components"></div>
        </div>
        <br>
        <br>
        <br>
        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/custom.js"></script>
    </body>
</html>
