<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BITS Organization - Cyber Blue Navbar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Background image styling */
        body {
            background-color: #000;
            background-image: url("{{ asset('assets/images/BITS.jpg') }}");
            background-size: cover;
            background-position: 50% 90%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #0ff;
            font-family: 'Courier New', monospace;
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
        .navbar-nav .nav-item {
            display: inline;
        }
        .navbar-nav .nav-link {
            color: #0ff;
            font-size: 1.1rem;
            text-decoration: none;
            padding: 8px 15px;
            transition: 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #fff;
            text-shadow: 0px 0px 5px #0ff;
        }
        .navbar-toggler {
            border: 1px solid #0ff;
        }
        .navbar-toggler-icon {
            filter: invert(100%);
        }
        
        /* Content Wrapper */
        .content-wrapper {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px #0ff;
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">AboutUs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">ContactUs</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
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
