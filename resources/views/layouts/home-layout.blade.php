<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Rental Mobil | {{ $title ?? config('app.name') }}</title>

    {{-- template --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    {{-- build --}}
    @livewireStyles
    <script src="{{ asset('build/assets/app-CifqVuM1.js') }}"></script>
    <script src="{{ asset('build/assets/app-l0sNRNKZ.js') }}"></script>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>

</head>

<body>

    {{ $slot }}

    @livewireScripts
    @stack('scripts')

    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
