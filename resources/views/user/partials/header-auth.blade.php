<header>
    <nav class="flex flex-row">
        <div class="account flex">                
                <ul class="not-auth flex flex-row center-center">
                    @if(App::isLocale('ar'))
                        <li><a href="{{route('setLanguage', 'en')}}" class="locale">@lang('public.english')</a></li>
                    @endif
                    @if(App::isLocale('en'))
                        <li><a href="{{route('setLanguage', 'ar')}}" class="locale">@lang('public.arabic')</a></li>
                    @endif
                </ul>
            </div>
        <div class="logo flex">
            <a href="{{route('user.home')}}" class="flex"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
        </div>
    </nav>
</header>
