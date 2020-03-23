<header class="admin-dashboard">
    <nav>
        <ul class="flex flex-column">
            <li><a href="{{route('admin.index')}}"><i class="fas fa-solar-panel"></i>@lang('public.dashboard')</a></li>
            <li><a href="{{route('admin.user.index')}}"><i class="fas fa-users"></i>@lang('public.users')</a></li>
            <li><a href="{{route('admin.request.index')}}"><i class="fas fa-list-alt"></i>@lang('public.requests')</a></li>
            <li><a href="#"><i class="fas fa-folder-open"></i>@lang('public.reports')</a></li>
        </ul>
    </nav>
</header>
