@extends('user.layouts.sign')

@section('content')
    <div class="form-container flex center-center">
        <form method="POST" action="{{ route('register', App::getlocale())}}" class="flex center-center flex-column">
            <div class="form-sample flex flex-row">
                @csrf
                <div class="flex flex-column">
                    <label>@lang('public.email')</label>@if ($errors->has('email')) <small class="error">{{ $errors->first('email') }}</small> @endif
                    <label>@lang('public.username')</label>@if($errors->has('username')) <small class="error">{{ $errors->first('username') }}</small> @endif
                    <label>@lang('public.password')</label>@if ($errors->has('password')) <small class="error">{{ $errors->first('password') }}</small> @endif
                    <label>@lang('public.re_password')</label>@if ($errors->has('password_confirmation')) <small class="error">{{ $errors->first('password_confirmation') }}</small> @endif
                </div>
                <div class="flex flex-column">
                    <input type="email" name="email" class="input-text @if($errors->has('email'))input-error @endif"  placeholder="example@scholarship.com" value="{{ \Illuminate\Support\Facades\Request::old('email') }}"required>
                    <input type="text" name="username" class="input-text @if($errors->has('username'))input-error @endif"  placeholder="scholarship" value="{{ \Illuminate\Support\Facades\Request::old('username') }}" required>
                    <input type="password" name="password" class="input-text @if($errors->has('password'))input-error @endif" placeholder="*******" required>
                    <input type="password" name="password_confirmation" class="input-text" placeholder="*******" required>
                </div>
            </div>
            <button class="btn btn-primary">@lang('public.register')</button>
            <a href="{{route('login', App::getlocale())}}">@lang('auth.already_have_an_account')</a>
        </form>
    </div>
@endsection