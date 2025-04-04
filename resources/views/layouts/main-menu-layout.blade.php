<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? 'Columban College Inc. | Main Menu' }}</title>

    <!-- External Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mainmenu-styles.css') }}">
</head>

<body class="bg-gradient d-flex justify-content-center align-items-center vh-100">

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.href = "/login"; // Redirect user back to login
            }
        });
    </script>

</body>
</html>