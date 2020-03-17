<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/olcusa.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @include('layouts.navbar._main')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('/js/feather.min.js')}}"></script>
    <script>
        const loadingAjax = `
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                </br>
                <span class=""></span>
            </div>
        `
    </script>
    @yield('javascript')
    @stack('javascript')
</body>
</html>
