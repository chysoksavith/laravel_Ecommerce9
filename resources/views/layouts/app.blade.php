<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="Keywords" content="@yield('meta_keyword')">
    <meta name="author" content="@yield('Savith')">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/detailPro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/category.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/index-prod.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/wishlist.css') }}">
    <link rel="stylesheet" href="{{asset('assets/frontend/cart.css')}}">
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS alertify js -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    @livewireStyles
</head>

<body>

    <header class=" position-fixed z-50 bg-white w-100 top-0">
        @include('layouts.include.frontend.header')
    </header>
    <main>
        @yield('content')
    </main>

    @yield('scripts')

</body>


{{-- script style for frontend --}}
<script src="{{ asset('assets/frontend/js/asidemenu.js') }}"></script>

<script src="{{ asset('assets/frontend/js/fronendDropDSearch.js') }}"></script>
{{-- scripte bootstrap and jquery --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<!-- JavaScript alertify js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    window.addEventListener('message', event => {
        alertify.set('notifier', 'position', 'bottom-righ');
        alertify.notify(event.detail.text, event.detail.type);
    });
</script>
@livewireScripts

</html>
