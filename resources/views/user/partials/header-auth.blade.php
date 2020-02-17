<header>
    <div class="logo">
        <a href="{{route('user.home')}}"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
    </div>
    <nav>
        <ul>
            @if(App::isLocale('ar'))
                <li><a href="{{route('setLanguage', 'en')}}" class="locale">@lang('public.english')</a></li>
            @endif
            @if(App::isLocale('en'))
                <li><a href="{{route('setLanguage', 'ar')}}" class="locale">@lang('public.arabic')</a></li>
            @endif
        </ul>
    </nav>
</header>