@extends('user.layouts.sign')

@section('content')
    <div class="form-container flex center-center reset">
        <form method="POST" action="{{ route('password.update')}}" class="flex center-center flex-column">
            @include('user.error.alert-form-message')
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">  
            <div class="form-sample flex flex-row">
                @csrf
                <div class="flex flex-column">
                    <label>@lang('public.email')</label>
                    <label>@lang('public.new_password')</label>
                    <label>@lang('public.re_password')</label>
                </div>
                <div class="flex flex-column">
                    <input type="email" name="email" class="input-text @if($errors->has('email'))input-error @endif"  placeholder="example@scholarship.com" value="{{ \Illuminate\Support\Facades\Request::old('email') }}"required>
                    <input type="password" name="password" class="input-text @if($errors->has('password'))input-error @endif" placeholder="*******" required>
                    <input type="password" name="password_confirmation" class="input-text" placeholder="*******" required>
                </div>
            </div>
            <button class="btn btn-primary">@lang('public.reset_password')</button>
        </form>
    </div>
@endsection