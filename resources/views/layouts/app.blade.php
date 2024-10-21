<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blogs') }}</title>
    {{-- css files --}}
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/summernote.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Blog Management</title>
</head>

<body>
    <div id="app">
        @include('partials.navbar')
        <main class="main pb-5">
            @if (Auth::user())
                @include('partials.sidebar')
            @endif
            <div class="content-area">
                @yield('content')
            </div>
        </main>
    </div>
    @if (session('success'))
        <div id="session-success" style="display: none;">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div id="session-error" style="display: none;">{{ session('error') }}</div>
    @endif
    @if (session('status'))
        <div id="session-status" style="display: none;">{{ session('status') }}</div>
    @endif
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/summernote.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        var baseUrl = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
</body>

</html>
