<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Instrumen</title>
    <!-- CDN Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            background: url('{{ asset('img/background.png') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .logo-container {
            display: inline-block;
            width: auto;
            float: right;
        }

        .logo {
            max-width: 120px;
        }

        /*    */

        .btn-custom {
            background: linear-gradient(45deg, #007bff, #00c851); /* Gradient dari biru ke hijau */
            color: white;
            border: none;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #0056b3, #00a44b); /* Gradient lebih gelap pada hover */
            transform: scale(1.05); /* Sedikit memperbesar tombol saat hover */
        }


        .fixed-menu {
            display: inline-block;
            position: fixed;
            top: 3px;
            left: 3px;
            width: auto;
            background-color: rgb(37, 205, 94);
            color: white;
            padding: 16px;
            border-radius: 0 0 16px 16px;
            z-index: 999;
        }

        .fixed-menu ul {
            display: block;
        }

        .fixed-menu a {
            color: white;
            text-underline: none;
            font-size: 18px;
            margin-top: 10px;
            display: inline-block;
        }
    </style>

</head>
<body>

@if(auth()->guard('web')->user() && auth()->guard('web')->user()->level != 'admin')
    <div class="fixed-menu">
        <i class="fa fa-user fa-2x"></i>&nbsp; &nbsp;
<strong>{{ ucwords(auth()->guard('web')->user()->tenagaKesehatan->namaLengkap) }}</strong>

        <div style="height: 1px; background-color: white; margin-top: 10px;"></div>
        <div>
            <a href="{{ route('welcome') }}" style="@if(in_array(request()->route()->getName(), ['welcome'])) font-weight: bold; @endif"> Beranda</a>
        </div>
        <div>
            <a href="{{ route('survey.index') }}" style="@if(in_array(request()->route()->getName(), ['survey.index'])) font-weight: bold; @endif">Form Instrumen</a>
        </div>
        <div>
            <a href="{{ route('survey.startPreview') }}" style="@if(in_array(request()->route()->getName(), ['survey.startPreview'])) font-weight: bold; @endif">Instrumen</a>
        </div>
        <div>
            <a href="{{ route('logout-tenaga-kesehatan') }}" onclick="return confirm('Are u sure?')">Logout</a>
        </div>
    </div>
@endif

<nav class="navbar container-fluid" style="width: 100% !important;">
    <div>

    </div>
    <div class="logo-container" style="margin-right: 120px;">
        <img src="{{ asset('img/logo-kemendikbud.png') }}" alt="Logo" class="logo" style="margin-right: 20px;">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
    </div>
</nav>

<div class="container" style="text-align: center">
    <div style="margin-top: 20px;">
        <div class="col-12">
            <img src="{{ url('img/robekan.png') }}">
        </div>
    </div>

    @if(auth()->guard('web')->user() && auth()->guard('web')->user()->level != 'admin')
        <div
            style="margin-top: 30px; color: rgb(0, 74, 173); font-weight: 700; padding: 10px 20px; border-radius: 32px; text-align: center; width: auto; display: inline-block;">
            <div class="col-12">
                <h1 class="header">PENGEMBANGAN INSTRUMEN PENILAIAN<br>PENYEMBUHAN LUKA PERINEUM PADA IBU NIFAS</h1>
            </div>
        </div>
    @else
        <div
            style="margin-top: 30px; background-color: rgb(32, 184, 83); color: white; font-weight: 700; padding: 10px 20px; border-radius: 32px; text-align: center; width: auto; display: inline-block;">
            <div class="col-12">
                <h1 class="header">PENGEMBANGAN INSTRUMEN PENILAIAN<br>PENYEMBUHAN LUKA PERINEUM PADA IBU NIFAS</h1>
            </div>
        </div>
    @endif

    @if(auth()->guard('web')->user() && auth()->guard('web')->user()->level != 'admin')
        <a class="btn btn-custom" style="color: white;" href="{{ route('survey.index') }}">Mulai Pengisian Instrumen</a>
    @else
        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('sign-tenaga-kesehatan') }}"
               style="font-size: 18px; display: block; text-align: center; color: rgb(0, 74, 173); font-weight: bold;">Sign
                In Here</a>
        </div>
        <div style="text-align: center">
            <a href="{{ route('register') }}"
               style="font-size: 18px;display: block; text-align: center; color: rgb(0, 74, 173); font-weight: bold;">Don't
                have an account?</a>
        </div>
    @endif
</div>

<!-- CDN Bootstrap JS and Popper.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
