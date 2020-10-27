<!DOCTYPE html>
<html>
    <head>
        <title>
            @auth('admin')
                @yield('dashboardTitle')
            @endauth
            @guest('admin')
                @yield('loginTitle')
            @endguest
        </title>

        <link rel="stylesheet" href="{{ asset('/css/app.css') }}"></link>
        <link rel="stylesheet" href="{{ asset('/css/shareholder/app.css') }}"></link>
    </head>


    <body>
        @auth('admin')
            @yield('dashboardContent')
        @endauth
        @guest('admin')
            @yield('loginContent')
        @endguest


        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/shareholder/app.js') }}"></script>
    </body>
</html>