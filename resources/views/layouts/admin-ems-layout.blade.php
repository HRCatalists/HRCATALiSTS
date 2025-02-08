<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <title>{{ $title ?? 'Columban College Inc. | Dashboard' }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>

    <!-- Styles CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Navbar CSS -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <!-- DB Calendar CSS -->
    <link rel="stylesheet" href="{{ asset('css/db-ems-calendar.css') }}">

    <!-- Gender Chart CSS -->
    <link rel="stylesheet" href="{{ asset('css/gender-stat.css') }}">

    <!-- Dept. Chart CSS -->
    <link rel="stylesheet" href="{{ asset('css/dept-chart.css') }}">
</head>

<body>

    {{ $slot }}
    
    <!-- Sidebar JS -->
    <script src="{{ asset('js/sidebar.js') }}"></script>

    <!-- Calendar JS -->
    <script src="{{ asset('js/db-calendar.js') }}"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    
</body>
</html>