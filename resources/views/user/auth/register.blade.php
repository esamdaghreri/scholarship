@extends('user.layouts.sign')

@section('content')
    <div class="form-container flex center-center">
        <form method="POST" action="{{ route('register')}}" class="flex center-center flex-column">
            <div class="form-sample flex flex-row">
                @csrf
                <div class="flex flex-column">
                    <label>@lang('public.email')</label>
                    <label>@lang('public.username')</label>
                    <label>@lang('public.password')</label>
                    <label>@lang('public.re_password')</label>
                </div>
                <div class="flex flex-column">
                    <input type="email" name="email" class="input-text @if($errors->has('email'))input-error @endif"  placeholder="example@scholarship.com" value="{{ \Illuminate\Support\Facades\Request::old('email') }}"required>
                    <input type="text" name="username" class="input-text @if($errors->has('username'))input-error @endif"  placeholder="scholarship" value="{{ \Illuminate\Support\Facades\Request::old('username') }}" required>
                    <input type="password" name="password" class="input-text @if($errors->has('password'))input-error @endif" placeholder="*******" required>
                    <input type="password" name="password_confirmation" class="input-text" placeholder="*******" required>
                </div>
            </div>
            <button class="btn btn-primary">@lang('public.register')</button>
            <a href="{{route('login')}}">@lang('auth.already_have_an_account')</a>
        </form>
    </div>
@endsection