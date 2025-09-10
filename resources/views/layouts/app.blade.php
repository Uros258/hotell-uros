<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Uroš</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Hotel Uroš</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Početna</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('rezervacije.index') }}">Moje rezervacije</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Moj profil</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    </div>

    <main class="flex-fill">
        <div class="container mb-5">
            @yield('content')
        </div>
    </main>

    <footer class="bg-light border-top py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-1 fw-bold">UROS</p>
            <p class="mb-1">Hotel Uros, Kralja Milana 27</p>
            <p class="mb-1">Phone: +381 11 36 40 425</p>
            <p class="mb-1">Email: rezervacije@hotelurosbelgrade.com</p>
            <div class="mt-2">
                <a href="#" class="me-3">Instagram</a>
                <a href="#" class="me-3">Facebook</a>
                <a href="#" class="me-3">X</a>
                <a href="#">Youtube</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
