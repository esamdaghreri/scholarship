<header>
    <div class="logo">
        <a href="{{route('user.home')}}"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
    </div>
    <nav>
        <ul>
            @if(Auth::check())
                <li><a class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('public.logout')</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="{{route('login')}}" class="btn btn-primary">@lang('public.login')</a></li>
                <li><a href="{{route('register')}}" class="btn btn-secondary">@lang('public.sign_up')</a></li>
            @endif
            @if(App::isLocale('ar'))
                <li><a href="{{route('setLanguage', 'en')}}" class="locale">@lang('public.english')</a></li>
            @endif
            @if(App::isLocale('en'))
                <li><a href="{{route('setLanguage', 'ar')}}" class="locale">@lang('public.arabic')</a></li>
            @endif
        </ul>
    </nav>
</header>