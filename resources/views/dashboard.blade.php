
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
        <title>TTSP - Tunas Toyota Sales Pocket</title>
        <link rel="stylesheet" type="text/css" href="styles/bootstrapp3.css">
        <link rel="stylesheet" type="text/css" href="styles/style3.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
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
                    Hi, {{ auth::user()->name }} |
                    <img src="images/pictures/logo_tunas.png" class="rounded-xl bg-green-dark" width="25">
                </h1>
                <a href="logout" class="page-title-icon shadow-xl bg-theme color-theme"><i class="fa fa-sign-out"></i></a>
            </div>
            <div class="page-title-clear"></div>

            <div class="card card-fixed" data-card-height="400">
                <div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-1">
                    <div class="splide__track">
                        <div class="splide__list">
                            <div class="splide__slide">
                                <div class="card bg-101" data-card-height="400">
                                    <div class="card-bottom text-center mb-3">
                                        <h1 class="color-white font-700 mb-0">Sales Pocket</h1>
                                        <p class="color-white">1 link untuk seluruh kebutuhan anda</p>
                                    </div>
                                    <!-- <div class="card-overlay bg-gradient"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-full shadow-xl">
                <div class="content">
                    <h1 class="font-24 font-700 mb-2">Daftar Menu Sales & Service Toolkit</h1>
                    <hr>
                    <div class="d-flex">
                        <div class="me-3">
                            <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/16l.jpg">
                        </div>
                        <div>
                            <h2>Sales Tools</h2>
                            <p class="mt-2">
                                Form untuk simulasi harga kendaraan
                            </p>
                            <a href="salestool" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                        </div>
                    </div>

                    <div class="divider mt-4"></div>

                    <div class="d-flex mquote2" id="mquote2">
                        <div class="me-3">
                            <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/app-toyota.jpg">
                        </div>
                        <div>
                            <h2>M-Quote</h2>
                            <p class="mt-2">
                                Aplikasi Android Toyota
                            </p>
                            {{-- <a id="mquote" href='https://play.google.com/store/apps/details?id=id.toyota.mquote&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Temukan di Google Play' src='https://play.google.com/intl/en_us/badges/static/images/badges/id_badge_web_generic.png' width="100" height="50"/></a>
                            <a href="mquote" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a> --}}
                            <a href="#" onclick="window.open('https://play.google.com/store/apps/details?id=id.toyota.mquote&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1');return false;" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                        </div>
                    </div>

                    <div class="divider mt-4"></div>

                    <div class="d-flex">
                        <div class="me-3">
                            <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/2.jpeg">
                        </div>
                        <div>
                            <h2>Digital Content Download</h2>
                            <p class="mt-2">
                                Digital Marketing Content Tunas Toyota
                            </p>
                            <a href="digitalcontent" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                        </div>
                    </div>

                    <div class="divider mt-4"></div>

                    <div class="d-flex">
                        <div class="me-3">
                            <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/31l.png">
                        </div>
                        <div>
                            <h2>Promo</h2>
                            <p class="mt-2">
                                Promo-promo yang ada di Tunas Toyota
                            </p>
                            <a href="promo" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                        </div>
                    </div>

                    <div class="divider mt-4"></div>
{{--
                    <div class="d-flex">
                        <div class="me-3">
                            <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/tcare2.jpg">
                        </div>
                        <div>
                            <h2>T-Care Sales</h2>
                            <p class="mt-2">
                                Informasi penjelasan service T-Care dari service ke 2 sampai ke 7
                            </p>
                            <a href="tcare" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                        </div>
                    </div>

                    <div class="divider mt-4"></div> --}}

                    <div class="d-flex">
                        <div class="me-3">
                            <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/tcare2.jpg">
                        </div>
                        <div>
                            <h2>t-Care</h2>
                            <p class="mt-2">
                                Informasi t-Care Tunas Toyota setelah penjualan
                            </p>
                            <a href="https://aftersales.toyota.astra.co.id/t-care" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                        </div>
                    </div>

                    <div class="divider mt-4"></div>
                    <div class="d-flex">

                    <div class="me-3">
                        <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/tintouch2.jpg">
                    </div>
                    <div>
                        <h2>T-intouch</h2>
                        <p class="mt-2">
                            Advanced Connectivity Life With More Simplicity
                        </p>
                        <a href="https://www.toyota.astra.co.id/tintouch" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                    </div>
                </div>

                <div class="divider mt-4"></div>

                    <div class="d-flex">
                        <div class="me-3">
                            <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/sosmed.png">
                        </div>
                        <div>
                            <h2>Sosial Media</h2>
                            <p class="mt-2">
                                Sosial Media Tunas Toyota
                            </p>
                            <a href="sosialmedia" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                        </div>
                    </div>

                    <div class="divider mt-4"></div>
                    @if (auth::user()->lokasi == "TOYOTA = DEWI SARTIKA")
                        <div class="d-flex">
                            <div class="me-3">
                                <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/tunascawang.jpg">
                            </div>
                            <div>
                                <h2>Tunas Toyota Cawang</h2>
                                <p class="mt-2">
                                    Website Tunas Toyota Cawang
                                </p>
                                <a href="https://tunastoyotacawang.co.id" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                            </div>
                        </div>
                        <div class="divider mt-4"></div>
                    @endif


                    <div class="d-flex">
                        <div class="me-3">
                            <img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/database.jpg">
                        </div>
                        <div>
                            <h2>Database Customer</h2>
                            <p class="mt-2">
                                Tools untuk menghubungi customer dan mencatat task
                            </p>
                            <a href="#" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" data-toggle-theme>
                <div class="card card-style">
                    <div class="d-flex pt-3 mt-1 mb-2 pb-2">
                        <div class="align-self-center">
                            <i class="color-icon-gray color-gray-dark font-30 icon-40 text-center fa fa-moon ms-3 show-on-theme-light"></i>
                            <i class="color-icon-yellow color-yellow-dark font-30 icon-40 text-center fa fa-sun ms-3 show-on-theme-dark"></i>
                        </div>
                        <div class="align-self-center">
                            <p class="ps-2 ms-1 color-highlight font-500 mb-n1 mt-n2">Tap to Enable</p>
                            <h4 class="show-on-theme-light ps-2 ms-1 mb-0">Dark Mode</h4>
                            <h4 class="show-on-theme-dark ps-2 ms-1 mb-0">Light Mode</h4>
                        </div>
                        <div class="ms-auto align-self-center mt-n2">
                            <div class="custom-control small-switch ios-switch me-3 mt-n2">
                                <input data-toggle-theme type="checkbox" class="ios-input" id="toggle-dark-home">
                                <label class="custom-control-label" for="toggle-dark-home"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="sidebar" data-menu-width="280" data-menu-active="nav-components"></div>
        </div>
        <br>
        <br>
        <br>
        <script type="text/javascript" src="scripts/jquery.js"></script>
        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/custom2.js"></script>
        <script>
            $(document).on('click', '.mquote2', function(){
                console.log('mquote')
                $.ajax({
                    url:"addmquote",
                    dataType:"json",
                    success:function(html)
                    {
                        console.log('sukses load')
                    }
                })
            });
            $(document).ready(function(){
            });
        </script>
    </body>
</html>
