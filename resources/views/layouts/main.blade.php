<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />

    {{-- Addons Libs --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="{{ asset('assets/js/demo-theme.min.js') }}"></script>
    <div class="page">
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')
        {{-- Navbar --}}
        @include('layouts.partials.navbar')

        <div class="page-wrapper">
            {{-- Content Section --}}
            @yield('content')

            {{-- Footer --}}
            @include('layouts.partials.footer')
        </div>
    </div>

    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>

    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/demo.min.js') }}" defer></script>

    {{-- Addons Libs --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>


    @stack('scripts')

</body>

</html>
