@extends('admin.layouts.master')
@section('content')
    <div class="dashboard felx center-center">
        <div class="card felx flex-row center-center">

            <div class="card-container">
                <div class="left">
                    <i class="fas fa-users fa-3x" aria-hidden="true"></i>
                </div>
                <div class="right">
                    <div class="upper-container">
                        <p class="number">{{$user_count}}</p>
                    </div>
                    <div class="lower-container">
                        <p>@lang('public.users')</p>
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="left">
                    <i class="fas fa-list-alt fa-3x" aria-hidden="true"></i>
                </div>
                <div class="right">
                    <div class="upper-container">
                        <p class="number">{{$total_requests}}</p>
                    </div>
                    <div class="lower-container">
                        <p>@lang('public.total_requests')</p>
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="left">
                    <i class="fas fa-window-close fa-3x" aria-hidden="true"></i>
                </div>
                <div class="right">
                    <div class="upper-container">
                        <p class="number">{{$cancel_count}}</p>
                    </div>
                    <div class="lower-container">
                        <p>@lang('public.cancel_requests')</p>
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="left">
                    <i class="fas fa-external-link-square-alt fa-3x" aria-hidden="true"></i>
                </div>
                <div class="right">
                    <div class="upper-container">
                        <p class="number">{{$extend_count}}</p>
                    </div>
                    <div class="lower-container">
                        <p>@lang('public.extend_requests')</p>
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="left">
                    <i class="fas fa-chalkboard-teacher fa-3x" aria-hidden="true"></i>
                </div>
                <div class="right">
                    <div class="upper-container">
                        <p class="number">{{$change_supervisor_count}}</p>
                    </div>
                    <div class="lower-container">
                        <p>@lang('public.change_supervisor_requests')</p>
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="left">
                    <i class="fas fa-graduation-cap fa-3x" aria-hidden="true"></i>
                </div>
                <div class="right">
                    <div class="upper-container">
                        <p class="number">{{$change_fellowship_count}}</p>
                    </div>
                    <div class="lower-container">
                        <p>@lang('public.change_fellowship_requests')</p>
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="left">
                    <i class="fas fa-sign-in-alt fa-3x" aria-hidden="true"></i>
                </div>
                <div class="right">
                    <div class="upper-container">
                        <p class="number">{{$register_scholarship_count}}</p>
                    </div>
                    <div class="lower-container">
                        <p>@lang('public.register_scholarship_requests')</p>
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="left">
                    <i class="fas fa-language fa-3x" aria-hidden="true"></i>
                </div>
                <div class="right">
                    <div class="upper-container">
                        <p class="number">{{$language_scholarship_count}}</p>
                    </div>
                    <div class="lower-container">
                        <p>@lang('public.language_scholarship_requests')</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection