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

        .btn-reset {
            background-color: #6c757d;
            color: white;
            border: none;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-reset:hover {
            background-color: #5a6268; /* Warna lebih gelap pada hover */
            transform: scale(1.05); /* Sedikit memperbesar tombol saat hover */
        }

    </style>

</head>
<body>

<nav class="navbar container-fluid" style="width: 100% !important;">
    <div>

    </div>
    <div class="logo-container" style="margin-right: 120px;">
        <img src="{{ asset('img/logo-kemendikbud.png') }}" alt="Logo" class="logo" style="margin-right: 20px;">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
    </div>
</nav>

<div class="container" style="text-align: center; width: 520px; margin-top: 160px;">

    <div
        style="margin-top: 30px; background-color: rgb(32, 184, 83); color: white; font-weight: 700; padding: 10px 20px; border-radius: 32px; text-align: center; width: 100%; display: inline-block;">
        <div class="col-12">
            <h1 class="header">Sign In</h1>
        </div>
    </div>

    <div
        style="margin-top: 30px; color: white; font-weight: 700; padding: 10px 20px; border-radius: 32px; text-align: center; width: 100%; display: inline-block;">


        <form action="{{ route('login-tenaga-kesehatan') }}" method="POST">
            @csrf

            @if($errors->any())
                <h4 style="color: red;">{{$errors->first()}}</h4>
            @endif

            <div class="form-group">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                       name="username" value="{{ old('username') }}" placeholder="Email / Username" required>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       name="password" value="{{ old('password') }}" placeholder="Password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group" style="text-align: left;">
                <input type="checkbox"> <span
                    style="color: black;">Remember me</span>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-actions" style="margin-bottom: 20px;">
                <button type="submit" class="btn btn-custom btn-block">Sign In</button>
            </div>
        </form>
    </div>


    <div style="text-align: center">

        <a href="{{ route('register') }}"
           style="font-size: 18px;display: block; text-align: center; color: rgb(0, 74, 173); font-weight: bold;">
            <span style="all: initial;">
                Don't have an account?
            </span>

            Create Account.
        </a>
    </div>
</div>

<!-- CDN Bootstrap JS and Popper.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
