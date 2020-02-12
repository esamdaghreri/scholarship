<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/user/main.css')}}">
        <link rel="icon" href="favicon.ico"/>
        <title>Scholarship</title>
    </head>
    <body>
        @include('user.partials.header-auth')
        <div class="container">
            @yield('content')
        </div>
        {{-- script --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        @if(App::getLocale() === 'ar')
            <script>
                $('html').attr('dir', 'rtl');
            </script>
        @else
            <script>
                $('html').attr('dir', 'ltr');
            </script>
        @endif
    </body>
</html>
