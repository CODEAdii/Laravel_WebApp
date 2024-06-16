<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css') }}">
    <style>
        .card1 {
        background: rgb(219, 221, 223);
        border: 1px solid #8d8c8c; /* Black border */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }
        .card1 h2{
            color: #302e2e;
        }
         .top-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
        }
        .navbar {
            display: flex;
            justify-content: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .menu li {
            margin-right: 20px;
        }
        .menu li:last-child {
            margin-right: 0;
        }
        .menu li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s;
        }
        .menu li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .body-content {
            padding: 20px 0;
            background-color: #f0f0f0;
        }
        .container .body-content {
            text-align: center;
        }
        .btn-custom {
            position: relative;
            background-color: #dfece2;
            border-color: #d4e5f8;
            color: #080808;
            transition: background-color 0.3s, padding-right 0.3s;
        }
        .btn-custom:hover {
            background-color: #5ec474;
            border-color: #1e7e34;
            padding-right: 30px;
            transform: scale(1.05); /* Zoom in by 10% */
            transition: transform 0.3s ease; /* Add smooth transition */

        }
        .btn-custom::after {
            content: '\f061';
            font-family: 'FontAwesome';
            position: absolute;
            right: 10px;
            opacity: 0;
            transition: right 0.3s, opacity 0.3s;
        }
        .btn-custom:hover::after {
            right: 20px;
            opacity: 1;
        }
        .container-fluid {
         margin-top: 50px; /* Adjust as needed */
        }
        .text-primary {
        color: blue; /* You can use any color you prefer */
        }

      
        /* Adjust footer style here */
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('scheme') }}">Upload File</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
       
        @yield("content")
        
    </div>

    <footer class="fixed-bottom">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <img src="{{ asset('images/NIC.png') }}" alt="Logo" class="img-fluid" style="max-width: 200px;">

            
            <!-- Social Links -->
            <div>
                <a href="https://github.com/yourgithub" target="_blank">
                    <i class="fab fa-github"  style="font-size: 24px;"></i>
                </a>
                <a href="www.linkedin.com/in/aditya-maurya-adi" target="_blank" style="font-size: 24px;">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://twitter.com/yourtwitter" target="_blank" style="font-size: 24px;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="mailto:adityamauryamaurya144@gmail.com" style="font-size: 24px;">
                    <i class="far fa-envelope"></i>
                </a>
            </div>
        </div>
    </footer>
    
    

    <script src="{{ asset('frontend/js/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap5.bundle.js') }}"></script>
</body>

</html>
