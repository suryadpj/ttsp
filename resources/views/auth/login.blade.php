<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>TTSP</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/logo_tunas.png">
<link rel="icon" href="app/icons/logo_tunas.png" sizes="32x32" type="image/png">
<link rel="icon" href="app/icons/logo_tunas.png" sizes="16x16" type="image/png">
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="header header-fixed header-logo-center">
        <a href="index.html" class="header-title">
            <img src="images/pictures/logo-tunas.png" width="200">
    </div>


    <div class="page-content header-clear-medium">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="card card-style">
            <div class="content">
                <p class="font-600 color-highlight mb-n1">Login</p>
                <h1 class="font-25">Tunas Toyota Sales Pocket</h1>
                <p>
                    Masukkan username dan NIK anda untuk memulai
                </p>

                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-user"></i>
                    <input type="name" class="form-control validate-name" id="form1a" placeholder="Username">
                    <label for="form1a" class="color-highlight">Username</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(wajib)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-lock"></i>
                    <input type="password" class="form-control validate-password" id="form1ab" placeholder="NIK Tunas Toyota anda">
                    <label for="form1ab" class="color-highlight">Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(wajib)</em>
                </div>

                <a href="#" data-back-button class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s">Sign In</a>

                {{-- <div class="row pt-3 mb-3">
                    <div class="col-6 text-start">
                        <a href="page-system-forgot-1.html" class="color-highlight">Forgot Password?</a>
                    </div>
                    <div class="col-6 text-end">
                        <a href="page-system-signup-1.html" class="color-highlight">Create Account</a>
                    </div>
                </div> --}}

                <div class="divider"></div>
                <p class="boxed-text-l mb-4">
                    &copy; Tunas Toyota - Head Office | 2022
                </p>
                <div class="text-center mb-4">
                    Kunjungi kami di :
                    <a href="#" class="icon icon-xs rounded-sm shadow-l mr-1 bg-dark"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="icon icon-xs rounded-sm shadow-l mr-1 bg-instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="icon icon-xs rounded-sm shadow-l mr-1 bg-phone"><i class="fa fa-globe"></i></a>
                </div>

                {{-- <a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-facebook mt-4 rounded-s"><i class="fab fa-facebook-f text-center"></i>Sign In with Facebook</a>
                <a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-twitter mt-2 rounded-s"><i class="fab fa-twitter text-center"></i>Sign In with Twitter</a>
                <a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-dark-dark mt-2 rounded-s"><i class="fab fa-apple text-center"></i>Sign In with Apple</a> --}}

            </div>
        </div>


        {{-- <div data-menu-load="menu-footer.html"></div> --}}
    </div>
    <!-- Page content ends here-->

    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.html" data-menu-width="280" data-menu-active="nav-pages"></div>

    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>

    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>


</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
