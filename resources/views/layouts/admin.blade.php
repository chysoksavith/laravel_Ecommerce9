<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- jq --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    {{-- css --}}
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @livewireStyles
</head>

<body class="sb-nav-fixed">

    @include('layouts.include.admin.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.include.admin.sidebar')
        </div>


        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    {{-- scripte bootstrap and jquery --}}

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    @yield('script')
    @livewireScripts
    @stack('script')
</body>

</html>
