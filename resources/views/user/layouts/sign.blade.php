<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/user/main.css')}}">
        <title>Scholarship</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </body>
</html>
