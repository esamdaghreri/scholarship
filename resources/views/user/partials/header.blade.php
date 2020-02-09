<header>
    <div class="logo">
        <a href="{{route('user.home')}}">Scholarship</a>
    </div>
    <nav>
        <ul>
            <li><a href="#" class="btn btn-primary">@lang('public.login')</a></li>
            <li><a href="#" class="btn btn-secondary">@lang('public.sign_up')</a></li>
            @if(App::isLocale('ar'))
                <li><a href="{{route('localization', 'en')}}" class="locale">@lang('public.english')</a></li>
            @endif
            @if(App::isLocale('en'))
                <li><a href="{{route('localization', 'ar')}}" class="locale">@lang('public.arabic')</a></li>
            @endif
        </ul>
    </nav>
</header>