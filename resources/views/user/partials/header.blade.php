<header>
    <div class="logo">
        <a href="{{route('user.home', App::getlocale())}}"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
    </div>
    <nav>
        <ul>
            <li><a href="#" class="btn btn-primary">@lang('public.login')</a></li>
            <li><a href="#" class="btn btn-secondary">@lang('public.sign_up')</a></li>
            @if(App::isLocale('ar'))
                <li><a href="{{route(Route::currentRouteName(), 'en')}}" class="locale">@lang('public.english')</a></li>
            @endif
            @if(App::isLocale('en'))
                <li><a href="{{route(Route::currentRouteName(), 'ar')}}" class="locale">@lang('public.arabic')</a></li>
            @endif
        </ul>
    </nav>
</header>