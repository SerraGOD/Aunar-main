<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="{{ URL::asset('/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <style>
            :root {
                --main-blue-color: #00255a;
                --main-yellow-color: #ffd608;
            }
        </style>
        @yield('css')
    </head>
    <body style="background-color: white !important;">
        @yield('content')
        @yield('script')
    </body>
</html>
