<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BITS (SLSU BONTOC)</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/SLSU.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        /* Background image styling */
        body {
            background-color: #000;
            background-image: url("{{ asset('assets/images/BITS1.jpg') }}");
            background-size: cover;
            background-position: 50% 80%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #0ff;
            font-family: 'Courier New', monospace;
            text-align: justify;
        }
        
        /* Cyber Blue Navbar */
        .navbar {
            background: rgba(0, 0, 0, 0.9);
            border-bottom: 2px solid #0ff;
            padding: 10px 20px;
            box-shadow: 0px 0px 10px #0ff;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #0ff !important;
            text-shadow: 0px 0px 10px #0ff;
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        
        .navbar-nav {
            display: flex;
            gap: 15px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Home, About, Contact Links */
        .navbar-nav .nav-item .nav-link {
            font-size: 1.2rem;
            color: #0ff;
            text-decoration: none;
            padding: 8px 15px;
            transition: 0.3s;
            position: relative;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #fff;
            text-shadow: 0px 0px 8px #0ff;
        }
        .navbar-nav .nav-item .nav-link::after {
            content: "";
            display: block;
            width: 0;
            height: 2px;
            background: #0ff;
            transition: width 0.3s ease-in-out;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .navbar-nav .nav-item .nav-link:hover::after {
            width: 100%;
        }

        /* Login and Register Buttons */
        .login-register {
            font-size: 1.3rem;
            padding: 10px 20px;
            border: 2px solid #0ff;
            border-radius: 5px;
            text-shadow: 0px 0px 5px #0ff;
            transition: 0.3s;
        }
        .login-register:hover {
            background: #0ff;
            color: #000 !important;
            text-shadow: none;
            box-shadow: 0px 0px 15px #0ff;
        }

        /* Content Wrapper */
        .content-wrapper {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px #0ff;
            text-align: justify;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/LOGO.png') }}" class="d-inline-block align-top">
                BITS Organization
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link login-register" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link login-register" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link login-register" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link login-register" href="{{ route('register') }}">Register</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <div class="content-wrapper">
            @yield('content')
        </div>  
    </div>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
