<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/font-awesome/css/all.css')}}">
{{--        <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}

        <!-- Scripts -->
        <script src="{{asset('js/popper.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('asset/jquery/jquery.min.js')}}"></script>
{{--        <script src="{{ asset('js/app.js') }}" defer></script>--}}
        <style>
            body{
                font-family: Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";

            }
        </style>
    </head>
    <body>
    @include('layouts.partials.navbar')
        <div class="container">
        @yield('content')

        </div>
    <form method="POST" action="{{ route('logout') }}" id="UserLogOutForm">@csrf</form>
    @stack('script')
    </body>
</html>
