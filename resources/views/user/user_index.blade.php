<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .navbar-custom {
            background-color: #007bff;
            /* Kék háttérszín */
        }

        .navbar-custom .navbar-nav .nav-link {
            color: white;
            /* Fehér szöveg */
        }

        .navbar-custom .navbar-nav .nav-link:hover {
            background-color: #0056b3;
            /* Világosabb kék háttér egér fölött */
        }

        .navbar-custom .navbar-nav .nav-link.active {
            background-color: #004085;
            /* Sötétebb kék háttér az aktív menüpontra */
        }
    </style>
</head>

<body class="antialiased">
    <div class="container">
        <!-- Navigation Menu -->
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Car Services</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @can('isUser')
                                <li class="nav-item">
                                    <a href="{{ url('/user') }}" class="nav-link">User Section</a>
                                </li>
                            @endcan
                            @can('isAdmin')
                                <li class="nav-item">
                                    <a href="{{ url('/admin') }}" class="nav-link">Admin Section</a>
                                </li>
                            @endcan
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Car Services Section -->
        <div class="row mt-4">
            <div class="col-md-4">
                <h4>Oil Changes</h4>
                <p>Regular oil changes keep your engine running in top condition, save gas, and help you avoid major
                    repairs.</p>
            </div>
            <div class="col-md-4">
                <h4>Brake Services</h4>
                <p>Comprehensive brake services including checks, repairs, and pad replacements.</p>
            </div>
            <div class="col-md-4">
                <h4>Tire Services</h4>
                <p>Ensure your tires are ready for the road with pressure checks, rotations, and replacements.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
