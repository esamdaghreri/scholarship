@extends('user.layouts.sign')

@section('content')
    <div class="form-container login flex center-center">
        <form method="POST" action="{{ route('login')}}" class="flex center-center flex-column">
            <div class="form-sample flex flex-row">
                @csrf
                <div class="label-side flex flex-column">
                    <label>@lang('public.username_or_email')</label>
                    <label>@lang('public.password')</label>
                </div>
                <div class="input-side flex flex-column">
                    <input type="text" name="username" class="input-text @if($errors->has('username'))input-error @endif"  placeholder="scholarship" value="{{ \Illuminate\Support\Facades\Request::old('username') }}" required>
                    <input type="password" name="password" class="input-text @if($errors->has('password'))input-error @endif" placeholder="*******" required>
                </div>
            </div>
            <button class="btn btn-primary">@lang('public.login')</button>
            <a href="{{route('password.request')}}">@lang('auth.Forgot_your_password')</a>
            <a href="{{route('register')}}">@lang('auth.do_not_have_an_account')</a>
        </form>
    </div>
@endsection