@extends('user.layouts.master')

@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center">
        <div class="back-button flex flex-column just-cont-flex-start">
            <a href="{{route('user.home')}}" class="btn btn-primary">@lang('public.back')</a>
        </div>
        <div class="title-with-field flex flex-column">
            <form action="{{route('personnel.updatePrivacy', Auth::id())}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="fields-section">
                    <div class="header-title">
                        <p>@lang('public.privacy')</p>
                        <hr class="bar">
                    </div>
                    <div class="fields flex flex-row">
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.email')</label>
                                <label>@lang('public.username')</label>
                            </div>
                            <div class="input-side">
                                <input type="email" name="email" class="input-text @if($errors->has('email'))input-error @endif" value="{{$user->email ?? \Illuminate\Support\Facades\Request::old('email')}}" required>
                                <input type="text" name="username" class="input-text @if($errors->has('username'))input-error @endif" value="{{$user->username ?? \Illuminate\Support\Facades\Request::old('username')}}" required>
                            </div>
                        </div>
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.password')</label>
                                <label>@lang('public.re_password')</label>
                            </div>
                            <div class="input-side">
                                <input type="password" name="password" class="input-text @if($errors->has('password'))input-error @endif">
                                <input type="password" name="password_confirmation" class="input-text @if($errors->has('re-password'))input-error @endif">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button flex just-cont-center al-items-center">
                    <button class="btn btn-primary">@lang('public.save')</button>
                </div>
            </form>
        </div>
    </div>
@endsection