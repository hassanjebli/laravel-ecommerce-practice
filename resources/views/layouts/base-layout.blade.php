@props(['title' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico" />
    <title>{{ $title ?? 'Default Title' }} | {{ config('app.name') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #f0f0f0;">

    <x-navbar />

    @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3"
            role="alert" style="width: 300px; z-index: 1050;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            // Automatically dismiss the alert after 3 seconds
            setTimeout(function() {
                document.getElementById('success-alert').classList.remove('show');
                document.getElementById('success-alert').classList.add('fade');
            }, 3000);
        </script>
    @endif

    <div class="container my-4">
        {{ $slot }}
    </div>



</body>

</html>
