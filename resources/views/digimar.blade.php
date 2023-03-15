
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>TTSP - Tunas Toyota Sales Pocket</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap5.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/logo_tunas.png">
<link rel="icon" href="app/icons/logo_tunas.png" sizes="32x32" type="image/png">
<link rel="icon" href="app/icons/logo_tunas.png" sizes="16x16" type="image/png">
<style>
.videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 600px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>
</head>
<body class="theme-light" data-highlight="highlight-red">
    <div id="menu-signup" class="menu menu-box-bottom rounded-m"
         data-menu-height="390"
         data-menu-effect="menu-over">
        <div class="menu-title">
            <p class="color-highlight">Tambah Data</p>
            <h1 class="font-24">Konten Digital Marketing</h1>
            <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
        </div>
        <div class="content mb-0 mt-0">
            <div class="input-style no-borders has-icon validate-field mb-4">
                <i class="fa fa-book"></i>
                <input type="name" class="form-control validate-name" id="form1acd" placeholder="Judul Konten">
                <label for="form1acd" class="color-highlight font-11 font-500">Judul konten yang anda upload</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="input-style no-borders has-icon validate-field mb-4">
                <i class="fa fa-globe"></i>
                <input type="text" class="form-control validate-email" id="form1ace" placeholder="Link konten">
                <label for="form1ace" class="color-highlight font-11 font-500">Link Konten yang akan anda simpan</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="input-style no-borders has-icon validate-field mb-4">
                <i class="fa fa-list"></i>
                <select id="form5">
                    <option value="default" disabled selected>Pilih Jenis Konten</option>
                    <option value="1">Instagram</option>
                    <option value="2">Tiktok</option>
                    <option value="3">Facebook</option>
                    <option value="4">Youtube</option>
                </select>
                <label for="form1adf" class="color-highlight font-11 font-500">Pilih konten anda</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <a href="#" class="btn btn-full btn-m shadow-l rounded-s font-600 bg-blue-dark mt-4">Upload</a>
        </div>
    </div>
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
<div id="page">
<div class="header header-auto-show header-fixed header-logo-center">
    <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
    <a href="home" class="header-title">
        <img src="images/pictures/logo-tunas.png" width="200">
    </a>
</div>
<div id="footer-bar" class="footer-bar-6">
<a href="home"><i class="fa fa-home"></i><span>Home</span></a>
<!-- <a href="index-pages.html"><i class="fa fa-file"></i><span>Pages</span></a> -->
<a href="#" class="circle-nav active-nav" data-menu="menu-signup"><i class="fa fa-plus"></i><span>Add Item</span></a>
<!-- <a href="index-projects.html"><i class="fa fa-image"></i><span>Projects</span></a> -->
<!-- <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a> -->
</div>
<div class="page-title page-title-fixed">
<h1 style="font-size:large;">Tunas Toyota Sales Pocket</h1>
<a href="logout" class="page-title-icon shadow-xl bg-theme color-theme"><i class="fa fa-sign-out"></i></a>
<a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
<a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
<!-- <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a> -->
</div>
<div class="page-title-clear"></div>
<div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome" data-menu-load="menu-main.html"></div>
<div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"> </div>
<div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>
<div class="page-content">
<div class="splide double-slider visible-slider slider-no-dots" id="double-slider-1">
<div class="splide__track">
<div class="splide__list">
<!--<div class="splide__slide ps-3">
<div data-card-height="220" class="card  shadow-xl rounded-m bg-16">
<div class="card-bottom text-center">
<h4 class="color-white font-800 mb-3">Bootstrap</h4>
</div>
<div class="card-overlay bg-gradient"></div>
</div>
</div> -->
<div class="splide__slide ps-3">
<div data-card-height="220" class="card  shadow-xl rounded-m bg-19">
<div class="card-bottom text-center">
<h4 class="color-white font-800 mb-3">Promo</h4>
</div>
<div class="card-overlay bg-gradient"></div>
</div>
</div>
<div class="splide__slide ps-3">
<div data-card-height="220" class="card  shadow-xl rounded-m bg-31">
<div class="card-bottom text-center">
<h4 class="color-white font-800 mb-3">POS</h4>
</div>
<div class="card-overlay bg-gradient"></div>
</div>
</div>
<div class="splide__slide ps-3">
<div data-card-height="220" class="card  shadow-xl rounded-m bg-33">
<div class="card-bottom text-center">
<h4 class="color-white font-800 mb-3">Web Tunas Toyota</h4>
</div>
<div class="card-overlay bg-gradient"></div>
</div>
</div>
<div class="splide__slide ps-3">
<div data-card-height="220" class="card  shadow-xl rounded-m bg-6">
<div class="card-bottom text-center">
<h4 class="color-white font-800 mb-3">T-Care</h4>
</div>
<div class="card-overlay bg-gradient"></div>
</div>
</div>
</div>
</div>
</div>
<div class="card card-style">
    <div class="content mb-0">

        <!-- <p class="mb-n1 color-highlight font-600">Digital Marketing</p> -->
        <h1 class="font-26 font-800 mb-3">Digital Marketing - Tiktok</h1>

        <a href="https://www.tiktok.com/@tunas.toyota/video/7173968301989645594?is_copy_url=1&is_from_webapp=v1" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Kijang Innova Zenix Hybrid</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/3.png" class="rounded-sm" width="100">
            </div>
        </a>
    </div>
</div>
<div class="card card-style">
    <div class="content mb-0">

        <!-- <p class="mb-n1 color-highlight font-600">Digital Marketing</p> -->
        <h1 class="font-26 font-800 mb-3">Digital Marketing Instagram</h1>
        </a>
        <a href="https://www.instagram.com/p/Cn016m1OwXD/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Kijang Innova Zenix hemat bensin ?</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
        <a href="https://www.instagram.com/p/CnvsUKMJpik/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Waspada, ini akibat kalau mobil pakai oli palsu</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
        <a href="https://www.instagram.com/p/CnWYSNBuCEx/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Kenapa service di tunas toyota ?</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
        <a href="https://www.instagram.com/p/Cng_mdMO4uE/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Buka bagasi pakai suara ?</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
        <a href="https://www.instagram.com/p/CneOOGFuLGR/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">3 cara untuk menghilangkan baret pada mobil</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
        <a href="https://www.instagram.com/p/CnROOrkMlua/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Plat Nomor putih Akan Dipasang Chip ID</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
        <a href="https://www.instagram.com/p/Cm6J16NO23N/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Check 5 komponen ini pada mobil kamu</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
        <a href="https://www.instagram.com/p/CnBYM1Uhvqq/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Begini Cara Membayar Tilang Elektronik</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
        <a href="https://www.instagram.com/p/Cl8KWFjhsPU/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Get your best deal with EZDeal</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
        <a href="https://www.instagram.com/p/CmDTuTDSs6V/" class="d-flex">
            <div class="me-auto">
                <h5 class="font-600 pt-2">Sejarah singkat Toyota Hybrid</h5>
                <span class="color-highlight opacity-60">@tunas.toyota</span>
            </div>
            <div class="ms-4 mb-4">
                <img src="images/pictures/4.jpg" class="rounded-sm" width="100">
            </div>
        </a>
    </div>
</div>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom2.js"></script>
</body>
