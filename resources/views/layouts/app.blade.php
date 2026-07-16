<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Taller Automotriz')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="topbar">
        <div class="container header-content">
            <a class="brand" href="{{ route('vehiculos.index') }}">Taller Automotriz</a>
            <a class="button button-light" href="{{ route('vehiculos.create') }}">+ Registrar vehículo</a>
        </div>
    </header>

    <main class="container page-content">
        @yield('content')
    </main>
</body>
</html>
