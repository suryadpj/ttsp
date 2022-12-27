
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>TTSP - Tunas Toyota Sales Pocket</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrapp1.css">
<link rel="stylesheet" type="text/css" href="styles/style3.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/logo_tunas.png">
<link rel="icon" href="app/icons/logo_tunas.png" sizes="32x32" type="image/png">
<link rel="icon" href="app/icons/logo_tunas.png" sizes="16x16" type="image/png">
</head>
<body class="theme-light" data-highlight="highlight-red">
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
<div id="page">
<div class="header header-auto-show header-fixed header-logo-center">
    <a href="home" class="header-title">
        <img src="images/pictures/logo-tunas.png" width="200">
    </a>
</div>
<div id="footer-bar" class="footer-bar-6">
<!-- <a href="index-components.html"><i class="fa fa-layer-group"></i><span>Features</span></a> -->
<!-- <a href="index-pages.html"><i class="fa fa-file"></i><span>Pages</span></a> -->
<a href="home" class="circle-nav active-nav"><i class="fa fa-home"></i><span>Welcome</span></a>
<!-- <a href="index-projects.html"><i class="fa fa-image"></i><span>Projects</span></a> -->
<!-- <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a> -->
</div>
<div class="page-title page-title-fixed">
<h1 style="font-size:large;">Hi, {{ auth::user()->name }} |
    <img src="images/pictures/logo_tunas.png" class="rounded-xl bg-green-dark" width="25"></h1>
<!-- <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a> -->
<a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
<a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
<!-- <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a> -->
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
<div class="card card-clear" data-card-height="400"></div>
<div class="card card-full shadow-xl">
<div class="content">
<!-- <p class="color-highlight font-600 mb-n1">A Complete Solution</p> -->
<h1 class="font-24 font-700 mb-2">Daftar Menu</h1>
<hr>
<div class="d-flex">
<div class="me-3">
<img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/16l.jpg">
</div>
<div>
<!-- <p class="color-highlight font-600 mb-n1">Beautifully Crafted</p> -->
<h2>Sales Tools</h2>
<p class="mt-2">
Form untuk simulasi harga kendaraan
</p>
<a href="#" onclick="window.open('salestool');return false;" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
</div>
</div>
<div class="divider mt-4"></div>
<div class="d-flex">
<div class="me-3">
<img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/1.jpeg">
</div>
<div>
<!-- <p class="color-highlight font-600 mb-n1">Beautifully Crafted</p> -->
<h2>POS</h2>
<p class="mt-2">
Aplikasi Android Toyota
</p>
<a href="https://play.google.com/store/apps/details?id=id.toyota.mquote" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
</div>
</div>
<div class="divider mt-4"></div>
<div class="d-flex">
<div class="me-3">
<img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/2.jpeg">
</div>
<div>
<!-- <p class="color-highlight font-600 mb-n1">Beautifully Crafted</p> -->
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
<!-- <p class="color-highlight font-600 mb-n1">Copy and Paste Ready</p> -->
<h2>Promo</h2>
<p class="mt-2">
Promo-promo yang ada di Tunas Toyota
</p>
<a href="promo" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
</div>
</div>
<div class="divider mt-4"></div>
<div class="d-flex">
<div class="me-3">
<img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/6.jpg">
</div>
<div>
<!-- <p class="color-highlight font-600 mb-n1">Beautifully Crafted</p> -->
<h2>T-Care</h2>
<p class="mt-2">
T-Care Tunas Toyota
</p>
<a href="tcare" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
</div>
</div>
<div class="divider mt-4"></div>
<div class="d-flex">
<div class="me-3">
<img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/5.jpg">
</div>
<div>
<!-- <p class="color-highlight font-600 mb-n1">Beautifully Crafted</p> -->
<h2>Sosial Media</h2>
<p class="mt-2">
Sosial Media Tunas Toyota
</p>
<a href="sosialmedia" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
</div>
</div>
<div class="divider mt-4"></div>
<div class="d-flex">
<div class="me-3">
<img width="120" class="fluid-img rounded-m shadow-xl" src="images/pictures/webcawang.jpg">
</div>
<div>
<!-- <p class="color-highlight font-600 mb-n1">Endless Options</p> -->
<h2>Tunas Toyota Cawang</h2>
<p class="mt-2">
Website Tunas Toyota Cawang
</p>
<a href="https://tunastoyotacawang.co.id" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Visit</a>
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
<!-- <div data-menu-load="menu-footer.html"></div> -->
</div>



<div id="menu-share" class="menu menu-box-bottom menu-box-detached">
<div class="menu-title mt-n1"><h1>Share the Love</h1><p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
<div class="content mb-0">
<div class="divider mb-0"></div>
<div class="list-group list-custom-small list-icon-0">
<a href="auto_generated" class="shareToFacebook external-link">
<i class="font-18 fab fa-facebook-square color-facebook"></i>
<span class="font-13">Facebook</span>
<i class="fa fa-angle-right"></i>
</a>
<a href="auto_generated" class="shareToTwitter external-link">
<i class="font-18 fab fa-twitter-square color-twitter"></i>
<span class="font-13">Twitter</span>
<i class="fa fa-angle-right"></i>
</a>
<a href="auto_generated" class="shareToLinkedIn external-link">
<i class="font-18 fab fa-linkedin color-linkedin"></i>
<span class="font-13">LinkedIn</span>
<i class="fa fa-angle-right"></i>
</a>
<a href="auto_generated" class="shareToWhatsApp external-link">
<i class="font-18 fab fa-whatsapp-square color-whatsapp"></i>
<span class="font-13">WhatsApp</span>
<i class="fa fa-angle-right"></i>
</a>
<a href="auto_generated" class="shareToMail external-link border-0">
<i class="font-18 fa fa-envelope-square color-mail"></i>
<span class="font-13">Email</span>
<i class="fa fa-angle-right"></i>
</a>
</div>
</div>
</div>


<div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m">
<img class="mx-auto mt-4 rounded-m" src="app/icons/icon-128x128.png" alt="img" width="90">
<h4 class="text-center mt-4 mb-2">Appkit on your Home Screen</h4>
<p class="text-center boxed-text-xl">
Install Appkit on your home screen, and access it just like a regular app. It really is that simple!
</p>
<div class="boxed-text-l">
<a href="#" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">Add to Home Screen</a>
<a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12 pb-4 mb-3">Maybe later</a>
</div>
</div>

<div id="menu-install-pwa-ios" class="menu menu-box-bottom rounded-m">
<div class="boxed-text-xl top-25">
<img class="mx-auto mt-4 rounded-m" src="app/icons/icon-128x128.png" alt="img" width="90">
<h4 class="text-center mt-4 mb-2">Appkit on your Home Screen</h4>
<p class="text-center ms-3 me-3">
Install Appkit on your home screen, and access it just like a regular app. Open your Safari menu and tap "Add to Home Screen".
</p>
<a href="#" class="pwa-dismiss close-menu btn-full mt-3 text-center text-uppercase font-700 color-red-light opacity-90 font-110 pb-5">Maybe later</a>
</div>
</div>
</div>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
