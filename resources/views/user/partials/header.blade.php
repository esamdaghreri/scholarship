<header>
    <nav class="flex flex-row">
        <div class="account flex">                
            @if(Auth::check())
                <div class="auth flex flex-row">
                    <div class="right">
                        <ul>
                            <li>
                                <a href="#" class="flex">
                                    <i class="fas fa-angle-down"></i>
                                    <img src="{{asset('assets/images/default_avator.png')}}" width="60" alt="avator_image">
                                    <p>{{Auth::user()->username}}</p>
                                </a>
                                <div class="dropdown">
                                    <ul>
                                        <li><a href="{{route('personnel.show', Auth::id())}}"><i class="fas fa-user"></i>@lang('public.profile')</a></li>
                                        <li><a href="{{route('personnel.showPrivacy', Auth::id())}}"><i class="fas fa-key"></i>@lang('public.privacy')</a></li>
                                        <li><a href="#"><i class="fas fa-briefcase"></i>@lang('public.orders')</a></li>
                                        <li onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a href="#"><i class="fas fa-sign-out-alt"></i>@lang('public.logout')</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="left">
                        <ul class="flex">
                            <li><a href="#"><i class="fas fa-home"></i></a></li>
                            <li><a href="#"><i class="fas fa-bell"></i></a></li>
                            @if(App::isLocale('ar'))
                                <li><a href="{{route('setLanguage', 'en')}}" class="locale">@lang('public.english')</a></li>
                            @endif
                            @if(App::isLocale('en'))
                                <li><a href="{{route('setLanguage', 'ar')}}" class="locale">@lang('public.arabic')</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
        </div>
        <div class="register-form flex">
            <li><a href="{{route('new-scholarship.index')}}" class="btn btn-primary">@lang('public.register_in_scholarship')</a></li>
        </div>
        @else
            <ul class="not-auth flex flex-row center-center">
                <li><a href="{{route('login')}}" class="btn btn-primary">@lang('public.login')</a></li>
                <li><a href="{{route('register')}}" class="btn btn-secondary">@lang('public.sign_up')</a></li>
                @if(App::isLocale('ar'))
                    <li><a href="{{route('setLanguage', 'en')}}" class="locale">@lang('public.english')</a></li>
                @endif
                @if(App::isLocale('en'))
                    <li><a href="{{route('setLanguage', 'ar')}}" class="locale">@lang('public.arabic')</a></li>
                @endif
            </ul>
        @endif
        <div class="logo flex">
            <a href="{{route('user.home')}}" class="flex"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
        </div>
    </nav>
</header>
@section('script')
    <script>
        $(document).ready(function() {
            $(".right ul li").click(function(){ 
                $(this).toggleClass("active");
                console.log($(this))
            });
        });
    </script>
@endsection