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
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/logo_tunas.png">
<link rel="icon" href="app/icons/logo_tunas.png" sizes="32x32" type="image/png">
<link rel="icon" href="app/icons/logo_tunas.png" sizes="16x16" type="image/png">
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="header header-fixed header-logo-center">
        <a href="login" class="header-title">
            <img src="images/pictures/logo-tunas.png" width="200">
        </a>
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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p class="font-600 color-highlight mb-n1">Login</p>
                        <h1 class="font-25">Tunas Toyota Sales Pocket</h1>
                        <p>
                            Masukkan username dan NIK anda untuk memulai
                        </p>

                        <div class="input-style no-borders has-icon validate-field mb-4">
                            <i class="fa fa-user"></i>
                            <input type="text" name="username" class="form-control validate-name" id="username" placeholder="Username">
                            <label for="form1a" class="color-highlight">Username</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(wajib)</em>
                        </div>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-style no-borders has-icon validate-field mb-4">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="password" class="form-control validate-password" id="password" placeholder="NIK Tunas Toyota anda">
                            <label for="form1ab" class="color-highlight">Password</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(wajib)</em>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <button type="submit" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s">
                            Login
                        </button>

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
                    </form>
                </div>
        </div>


        {{-- <div data-menu-load="menu-footer.html"></div> --}}
    </div>
    <!-- Page content ends here-->

</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom2.js"></script>
</body>
