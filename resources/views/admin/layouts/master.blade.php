<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/user/main.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin/main.css')}}">
        <link rel="icon" href="favicon.ico"/>
        <title>{{env('APP_NAME')}}</title>
        <script src="https://kit.fontawesome.com/abc82d1ac7.js" crossorigin="anonymous"></script>
    </head>
    <body>
        @include('admin.partials.header')
        <div class="container">
            <div class="dashboard-div flex flex-row">
                @include('admin.partials.dashboard-header')
                @yield('content')
            </div>
            @include('user.partials.footer')
        </div>
        {{-- script --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
        @yield('script')
        @if(App::getLocale() === 'ar')
            <script>
                $('html').attr('dir', 'rtl');
            </script>
        @else
            <script>
                $('html').attr('dir', 'ltr');
            </script>
        @endif
        <script>
            $(document).ready(function(){
                $(".right ul li").click(function(){ 
                    $(this).toggleClass("active");
                });
            });
        </script>
    </body>
</html>
