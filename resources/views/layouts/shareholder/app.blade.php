<!DOCTYPE html>
<html>
    <head>
        <title>
            @auth('shareholder')
                @yield('dashboardTitle')
            @endauth
            @guest('shareholder')
                @yield('loginTitle')
            @endguest
        </title>

        <link rel="stylesheet" href="{{ asset('/css/app.css') }}"></link>
        <link rel="stylesheet" href="{{ asset('/css/shareholder/app.css') }}"></link>
    </head>


    <body>
        @auth('shareholder')
            @yield('dashboardContent')
        @endauth
        @guest('shareholder')
            @yield('loginContent')
        @endguest


        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/shareholder/app.js') }}"></script>
    </body>
</html>