@extends('user.layouts.master')

@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center">
        <div class="back-button flex flex-column just-cont-flex-start">
            <a href="{{route('user.home')}}" class="btn btn-primary">@lang('public.back')</a>
        </div>
        <div class="title-with-field flex flex-column">
            <form action="{{route('personnel.updatePersonnelData', Auth::id())}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="fields-section">
                    <div class="header-title">
                        <p>@lang('public.general_information')</p>
                        <hr class="bar">
                    </div>
                    <div class="fields flex flex-row">
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.first_name')</label>
                            </div>
                            <div class="input-side">
                                <input type="text" name="first_name" class="input-text @if($errors->has('first_name'))input-error @endif" value="{{$user_information->first_name ?? \Illuminate\Support\Facades\Request::old('first_name')}}" required>
                            </div>
                        </div>
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.second_name')</label>
                            </div>
                            <div class="input-side">
                                <input type="text" name="second_name" class="input-text @if($errors->has('second_name'))input-error @endif" value="{{$user_information->second_name ?? \Illuminate\Support\Facades\Request::old('second_name')}}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fields-section">
                    <div class="header-title">
                    </div>
                    <div class="fields flex flex-row">
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.third_name')</label>
                            </div>
                            <div class="input-side">
                                <input type="text" name="third_name" class="input-text @if($errors->has('third_name'))input-error @endif" value="{{$user_information->third_name ?? \Illuminate\Support\Facades\Request::old('third_name')}}" required>
                            </div>
                        </div>
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.fourth_name')</label>
                            </div>
                            <div class="input-side">
                                <input type="text" name="fourth_name" class="input-text @if($errors->has('fourth_name'))input-error @endif" value="{{$user_information->fourth_name ?? \Illuminate\Support\Facades\Request::old('fourth_name')}}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fields-section">
                    <div class="header-title">
                    </div>
                    <div class="fields flex flex-row">
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.gender')</label>
                            </div>
                            <div class="input-side">
                                <select name="gender" class="input-text @if($errors->has('gender'))input-error @endif">
                                    @if(is_null($user_information->gender_id))
                                        <option value="1" selected>@lang('public.male')</option>
                                        <option value="2">@lang('public.female')</option>
                                    @else
                                        <option value="1" {{$user_information->gender_id =="1" ? "selected" : null}}>@lang('public.male')</option>
                                        <option value="2" {{$user_information->gender_id == "2" ? "selected" : null}}>@lang('public.female')</option>
                                    @endif
                                </select>                            
                            </div>
                        </div>
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.birthdate')</label>
                            </div>
                            <div class="input-side">
                                <input type="date" name="birthdate" class="input-text @if($errors->has('birthdate'))input-error @endif" value="{{date('Y-m-d', strtotime($user_information->birthdate)) ?? \Illuminate\Support\Facades\Request::old('birthdate')}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fields-section">
                    <div class="header-title">
                    </div>
                    <div class="fields flex flex-row">
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.mobile_number')</label>
                            </div>
                            <div class="input-side">
                                <input type="number" name="phone" class="input-text @if($errors->has('phone'))input-error @endif" value="{{$user_information->phone ?? \Illuminate\Support\Facades\Request::old('phone')}}" required>
                            </div>
                        </div>
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.telephone_number')</label>
                            </div>
                            <div class="input-side">
                                <input type="number" name="telephone" class="input-text @if($errors->has('telephone'))input-error @endif" value="{{$user_information->telephone ?? \Illuminate\Support\Facades\Request::old('telephone')}}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fields-section">
                    <div class="header-title">
                    </div>
                    <div class="fields flex flex-row">
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.national__or_residence_number')</label>
                            </div>
                            <div class="input-side">
                                <input type="number" name="national_number" class="input-text @if($errors->has('national_number'))input-error @endif" value="{{$user_information->national_number ?? \Illuminate\Support\Facades\Request::old('national_number')}}" required>
                            </div>
                        </div>
                         <div class="column">
                            <div class="label-side">
                                <label>@lang('public.nationality')</label>
                            </div>
                            <div class="input-side">
                                <select name="nationality" class="input-text @if($errors->has('nationality'))input-error @endif" required>
                                    @foreach ($nationalities as $nationality)
                                        <option value="{{$nationality->id}}" {{$nationality->id == $user_information->nationality_id ? "selected" : null}}>{{App::getlocale() == "en" ? $nationality->name_en : $nationality->name_ar}}</option>
                                    @endforeach
                                </select>   
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fields-section">
                    <div class="header-title">
                    </div>
                    <div class="fields flex flex-row">
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.employee_number')</label>
                            </div>
                            <div class="input-side">
                                <input type="employee_number" name="employee_number" class="input-text @if($errors->has('employee_number'))input-error @endif" value="{{$user_information->employee_number ?? \Illuminate\Support\Facades\Request::old('employee_number')}}" required>
                            </div>
                        </div>
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.date_of_joining_the_university')</label>
                            </div>
                            <div class="input-side">
                                <input type="date" name="date_of_joining_the_university" class="input-text @if($errors->has('date_of_joining_the_university'))input-error @endif" value="{{date('Y-m-d', strtotime($user_information->date_of_joining_the_university)) ?? \Illuminate\Support\Facades\Request::old('date_of_joining_the_university')}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fields-section">
                    <div class="header-title">
                        <p>@lang('public.college_information')</p>
                        <hr class="bar">
                    </div>
                    <div class="fields flex flex-row">
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.highest_qualification')</label>
                            </div>
                            <div class="input-side">
                                <select name="highest_qualification" class="input-text @if($errors->has('highest_qualification'))input-error @endif" required>
                                    @foreach ($qualifications as $qualification)
                                        <option value="{{$qualification->id}}" {{$qualification->id == $user_information->highest_qualification ? "selected" : null}}>{{App::getlocale() == "en" ? $qualification->name_en : $qualification->name_ar}}</option>
                                    @endforeach
                                </select>                               
                            </div>
                        </div>
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.country')</label>
                            </div>
                            <div class="input-side">
                                <select name="graduation_country" class="input-text @if($errors->has('graduation_country'))input-error @endif" required>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}" {{$country->id == $user_information->graduation_country_id ? "selected" : null}}>{{App::getlocale() == "en" ? $country->name_en : $country->name_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fields-section">
                    <div class="header-title">
                    </div>
                    <div class="fields flex flex-row">
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.university')</label>
                            </div>
                            <div class="input-side">
                                <select name="graduation_university" class="input-text @if($errors->has('graduation_university'))input-error @endif" required>
                                    @foreach ($universities as $university)
                                        <option value="{{$university->id}}" {{$university->id == $user_information->graduation_university_id ? "selected" : null}}>{{App::getlocale() == "en" ? $university->name_en : $university->name_ar}}</option>
                                    @endforeach
                                </select>                             
                            </div>
                        </div>
                        <div class="column">
                            <div class="label-side">
                                <label>@lang('public.college')</label>
                            </div>
                            <div class="input-side">
                                <select name="graduation_college" class="input-text @if($errors->has('graduation_college'))input-error @endif" required>
                                    @foreach ($colleges as $college)
                                        <option value="{{$college->id}}" {{$college->id == $user_information->graduation_college_id	 ? "selected" : null}}>{{App::getlocale() == "en" ? $college->name_en : $college->name_ar}}</option>
                                    @endforeach
                                </select>  
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