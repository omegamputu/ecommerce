<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title', '')</title>

    @section('scripts')
        <!-- Scripts -->
            <script src="{{ mix('js/app.js') }}" defer></script>
            <script src="{{ asset('js/jquery.easing.min.js') }}" defer></script>
            <script src="{{ asset('js/main.js') }}" defer></script>
            <script src="{{ asset('js/holder.js') }}" defer></script>
        @show

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    @yield('extra.css')
</head>
<body>
    <div id="app">
        @include('partials.nav')
        <main class="py-4">
            <div class="container">
                @include('partials.message.flash')
            </div>
            @yield('content')
        </main>
        @include('partials.footer')

        @yield('extra.js')
</div>
</body>
</html>
