<header class="admin-dashboard">
    <nav>
        <ul class="flex flex-column">
            <li><a href="{{route('admin.index')}}"><i class="fas fa-solar-panel"></i>@lang('public.dashboard')</a></li>
            <li><a href="{{route('admin.user.index')}}"><i class="fas fa-users"></i>@lang('public.users')</a></li>
            <li class="dropdown">
                <a href="#"><i class="fas fa-list-alt"></i>@lang('public.requests')<i class="fas fa-angle-down"></i></a>
                <ul>
                    <li><a href="{{route('admin.request.register')}}"><i class="fas fa-sign-in-alt"></i>@lang('public.register')</a></li>
                    <li><a href="{{route('admin.request.language')}}"><i class="fas fa-language"></i>@lang('public.language')</a></li>
                    <li><a href="{{route('admin.request.cancel')}}"><i class="fas fa-window-close "></i>@lang('public.cancel')</a></li>
                    <li><a href="{{route('admin.request.extend')}}"><i class="fas fa-external-link-square-alt"></i>@lang('public.extend')</a></li>
                    <li><a href="{{route('admin.request.change_supervisor')}}"><i class="fas fa-chalkboard-teacher"></i>@lang('public.change_supervisor')</a></li>
                    <li><a href="{{route('admin.request.change_fellowship')}}"><i class="fas fa-graduation-cap"></i>@lang('public.change_fellowship')</a></li>
                </ul>
            </li>
            <li><a href="{{route('admin.report.index')}}"><i class="fas fa-folder-open"></i>@lang('public.reports')</a></li>
        </ul>
    </nav>
</header>