<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0"> --}}

    <link rel="icon" type="image/png" href="{{ asset('images/ccihr-logo.png') }}">


    <title>{{ $title ?? 'Columban College Inc. | HR CATALISTS' }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- {{-- JQuery  --}} -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

    <!-- Buttons for datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <!-- Styles CSS --> 
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Navbar CSS -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Data tables CSS -->
    <link rel="stylesheet" href="{{ asset('css/data-tables.css') }}">

    <!-- Dashboard Calendar CSS -->
    <link rel="stylesheet" href="{{ asset('css/db-ats-calendar.css') }}">

    <!-- Calendar CSS -->
    <link rel="stylesheet" href="{{ asset('css/ats-calendar.css') }}">

    <!-- Online Recruitment CCS -->
    <link rel="stylesheet" href="{{ asset('css/ol-recruitment.css') }}">
</head>

<body>
    {{-- Navbar with Notifications --}}
    {{-- <x-partials.system.system-navbar /> --}}
    @include('components.partials.system.system-navbar', [
        'notifications' => $notifications ?? [],
        'notificationsCount' => $notificationsCount ?? 0,
    ])

    {{ $slot }}

    <x-partials.system.system-scripts />
    {{-- @include('components.partials.system.system-scripts') --}}


</body>
</html>