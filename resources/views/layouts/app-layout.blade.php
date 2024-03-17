<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIstem Rental Mobil | {{ $title ?? config('app.name') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />

    @stack('styles')


    {{-- build --}}
    @livewireStyles

    <script src="{{ asset('build/assets/app-CifqVuM1.js') }}"></script>
    <script src="{{ asset('build/assets/app-l0sNRNKZ.js') }}"></script>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <x-sidebar />

        <!--  Main wrapper -->
        <div class="body-wrapper">

            <x-header />

            <div class="container-fluid">

                {{ $slot }}

            </div>
        </div>
    </div>

    @livewireScripts

    @stack('scripts')

    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
</body>

</html>
