<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Columban College Inc. | Careers' }}</title>

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- fontawesome icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Styles CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Navbar CSS -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    
    <!-- Online Recruitment CSS -->
    <link rel="stylesheet" href="{{ asset('css/ol-recruitment.css') }}">

    <!-- Animated buttons CSS -->
    <link rel="stylesheet" href="{{ asset('css/animated-btns.css') }}">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<body>

    <x-partials.welcome.navbar />

    {{ $slot }}

    <x-partials.welcome.footer />

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/swiper.js"></script>

<<<<<<< HEAD
    <script src="{{ asset('js/back-to-top.js') }}"></script>

=======
<<<<<<< HEAD
=======
    <script src="{{ asset('js/back-to-top.js') }}"></script>

>>>>>>> hr-catalists
>>>>>>> 53eaa7626ee2bc35004633ce2f6496ccff20f396
</body>
</html>