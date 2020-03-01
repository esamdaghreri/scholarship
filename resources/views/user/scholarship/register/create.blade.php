@extends('user.layouts.master')

@section('content')
    <div class="form-container new-scholarship flex center-center">
        <form action="{{ route('register.store')}}" method="POST" class="flex center-center flex-column">
            <div class="form-sample flex flex-row">
                @csrf
                <div class="label-side flex flex-column">
                    <label>@lang('public.country')</label>
                    <label>@lang('public.university')</label>
                    <label>@lang('public.college')</label>
                    <label>@lang('public.qualification')</label>
                    <label>@lang('public.specialist')</label>
                </div>
                <div class="input-side flex flex-column">
                    <select name="country" class="input-text @if($errors->has('graduation_country'))input-error @endif" required>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{App::getlocale() == "en" ? $country->name_en : $country->name_ar}}</option>
                        @endforeach
                    </select>
                    <select name="university" class="input-text @if($errors->has('university'))input-error @endif" required>
                        @foreach ($universities as $university)
                            <option value="{{$university->id}}">{{App::getlocale() == "en" ? $university->name_en : $university->name_ar}}</option>
                        @endforeach
                    </select>
                    <select name="college" class="input-text @if($errors->has('college'))input-error @endif" required>
                        @foreach ($colleges as $college)
                            <option value="{{$university->id}}">{{App::getlocale() == "en" ? $college->name_en : $college->name_ar}}</option>
                        @endforeach
                    </select>
                    <select name="qualification" class="input-text @if($errors->has('qualification'))input-error @endif" required>
                        @foreach ($qualifications as $qualification)
                            @if($qualification->id <= $user->highest_qualification + 1)
                                <option value="{{$qualification->id}}">{{App::getlocale() == "en" ? $qualification->name_en : $qualification->name_ar}}</option>
                            @endif
                        @endforeach
                    </select>
                    <select name="specialist" class="input-text @if($errors->has('specialist'))input-error @endif" required>
                        @foreach ($specialists as $specialist)
                            <option value="{{$specialist->id}}">{{App::getlocale() == "en" ? $specialist->name_en : $specialist->name_ar}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="accept-terms">
                <label>@lang('public.accept_all_terms_and_conditions')</label>
                <input type="checkbox" name="terms_and_condition" required>
            </div>
            <button class="btn btn-primary">@lang('public.register')</button>
        </form>
    </div>
@endsection