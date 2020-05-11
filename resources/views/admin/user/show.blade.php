@extends('admin.layouts.master')

@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center">
        <div class="back-button flex flex-column just-cont-flex-start">
            <a href="{{route('admin.user.index')}}" class="btn btn-primary">@lang('public.back')</a>
        </div>
        <div class="title-with-table flex flex-column">
            <div class="tables-section">
                <div class="header-title">
                    <p>{{$user->username}}</p>
                    <hr class="bar">
                </div>
                <table class="flex flex-column details">
                    <tr class="contant-method">
                        <th>@lang('public.personnel_data')</th>
                    </tr>
                    <tr>
                        <th>@lang('public.email')</th>
                        <td>{{$user->email}}</td>
                        <th>@lang('public.username')</th>
                        <td>{{$user->username}}</td>
                        <th>@lang('public.role')</th>
                        <td>{{App::getlocale() == "en" ? $user->role->name_en : $user->role->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.name')</th>
                        <td>{{$user->first_name . ' ' . $user->second_name . ' ' . $user->third_name . ' ' . $user->fourth_name}}</td>
                        <th>@lang('public.gender')</th>
                        @if(is_null($user->gender))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->gender->name_en : $user->gender->name_ar}}</td>                        
                        @endif
                        <th>@lang('public.national__or_residence_number')</th>
                        <td>{{$user->national_number}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.nationality')</th>

                        @if(is_null($user->nationality))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->nationality->name_en : $user->nationality->name_ar}}</td>
                        @endif
                        <th>@lang('public.mobile_number')</th>
                        <td>{{$user->phone}}</td>
                        <th>@lang('public.telephone_number')</th>
                        <td>{{$user->telephone}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.employee_number')</th>
                        <td>{{$user->employee_number}}</td>
                        <th>@lang('public.date_of_joining_the_university')</th>
                        @if(is_null($user->highestQualification) || is_null($user->graduationCountry))
                            <td></td>
                        @else
                            <td>{{date('Y-m-d', strtotime($user->date_of_joining_the_university))}}</td>
                        @endif
                        <th>@lang('public.highest_qualification')</th>
                        @if(is_null($user->highestQualification))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->highestQualification->name_en : $user->highestQualification->name_ar}}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>@lang('public.graduation_country')</th>

                        @if(is_null($user->graduationCountry))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->graduationCountry->name_en : $user->graduationCountry->name_ar}}</td>
                        @endif
                        <th>@lang('public.graduation_university')</th>
                        @if(is_null($user->graduationUniversity))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->graduationUniversity->name_en : $user->graduationUniversity->name_ar}}</td>
                        @endif
                        <th>@lang('public.graduation_college')</th>
                        @if(is_null($user->graduationCollege))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->graduationCollege->name_en : $user->graduationCollege->name_ar}}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>@lang('public.department')</th>
                        
                        @if(is_null($user->department))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->department->name_en : $user->department->name_ar}}</td>
                        @endif
                        <th>@lang('public.general_specialization')</th>
                        @if(is_null($user->generalSpecialization))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->generalSpecialization->name_en : $user->generalSpecialization->name_ar}}</td>
                        @endif
                        <th>@lang('public.job_description')</th>
                        @if(is_null($user->jobDescription))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->jobDescription->name_en : $user->jobDescription->name_ar}}</td>
                        @endif

                    </tr>
                    <tr>
                        <th>@lang('public.fellowship')</th>

                        @if(is_null($user->fellowship))
                            <td></td>
                        @else
                            <td>{{App::getlocale() == "en" ? $user->fellowship->name_en : $user->fellowship->name_ar}}</td>
                        @endif
                    </tr>
                    <tr>
                        <th>@lang('public.created_by')</th>
                        <td>{{$user->created_by}}</td>
                        <th>@lang('public.created_at')</th>
                        <td>{{date('Y-m-d', strtotime($user->created_at))}}</td>
                        <th>@lang('public.updated_by')</th>
                        <td>{{$user->updated_by}}</td>
                        <th>@lang('public.updated_at')</th>
                        <td>{{date('Y-m-d', strtotime($user->updated_at))}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection