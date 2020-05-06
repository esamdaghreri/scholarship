@extends('user.layouts.sign')

@section('content')
    <div class="form-container email flex center-center">
        <form method="POST" action="{{ route('password.email')}}" class="flex center-center flex-column">
            @include('user.error.alert-form-message')
            <div class="form-sample flex flex-row">
                @csrf
                <div class="label-side flex flex-column">
                    <label>@lang('public.email')</label>@if ($errors->has('email')) <small class="error">{{ $errors->first('email') }}</small> @endif
                </div>
                <div class="input-side flex flex-column">
                    <input type="email" name="email" class="input-text @if($errors->has('email'))input-error @endif"  placeholder="example@scholarship.com" value="{{ \Illuminate\Support\Facades\Request::old('username') }}" required>
                </div>
            </div>
            <button class="btn btn-primary">@lang('public.send')</button>
        </form>
    </div>
@endsection