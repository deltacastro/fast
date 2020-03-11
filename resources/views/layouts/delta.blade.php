<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/jquery-3.4.1.min.map') }}"></script> --}}
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.js.map') }}"></script> --}}
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fontawesome/css/all.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/olcusa.css') }}" rel="stylesheet">
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
    {{-- <link href="{{ asset('css/bootstrap.css.map') }}"> --}}

    @yield('style')
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.dashboard.sidebar')
            <div class="main-panel py-3">
                @yield('content')
            </div>
            {{-- @include('layouts.dashboard.sidebar') --}}
        </div>
    </div>
    {{-- @include('layouts.navbar') --}}
    {{-- <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.sidebar')
            <!-- End sidebar -->
            <main role="main" class="delta-w px-4">
                <div class="content">
                    @yield('content')
                </div>
            </main>
        </div>
    </div> --}}
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
