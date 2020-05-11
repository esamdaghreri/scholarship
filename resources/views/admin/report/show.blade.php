@extends('admin.layouts.master')

@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center">
        <div class="back-button flex flex-column just-cont-flex-start">
            <a href="{{route('admin.report.index')}}" class="btn btn-primary">@lang('public.back')</a>
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
                        <td>{{App::getlocale() == "en" ? $user->gender->name_en : $user->gender->name_ar}}</td>
                        <th>@lang('public.national__or_residence_number')</th>
                        <td>{{$user->national_number}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.nationality')</th>
                        <td>{{App::getlocale() == "en" ? $user->nationality->name_en : $user->nationality->name_ar}}</td>
                        <th>@lang('public.mobile_number')</th>
                        <td>{{$user->phone}}</td>
                        <th>@lang('public.telephone_number')</th>
                        <td>{{$user->telephone}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.employee_number')</th>
                        <td>{{$user->employee_number}}</td>
                        <th>@lang('public.date_of_joining_the_university')</th>
                        <td>{{date('Y-m-d', strtotime($user->date_of_joining_the_university))}}</td>
                        <th>@lang('public.highest_qualification')</th>
                        <td>{{App::getlocale() == "en" ? $user->highestQualification->name_en : $user->highestQualification->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.graduation_country')</th>
                        <td>{{App::getlocale() == "en" ? $user->graduationCountry->name_en : $user->graduationCountry->name_ar}}</td>
                        <th>@lang('public.graduation_university')</th>
                        <td>{{App::getlocale() == "en" ? $user->graduationUniversity->name_en : $user->graduationUniversity->name_ar}}</td>
                        <th>@lang('public.graduation_college')</th>
                        <td>{{App::getlocale() == "en" ? $user->graduationCollege->name_en : $user->graduationCollege->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.department')</th>
                        <td>{{App::getlocale() == "en" ? $user->department->name_en : $user->department->name_ar}}</td>
                        <th>@lang('public.general_specialization')</th>
                        <td>{{App::getlocale() == "en" ? $user->generalSpecialization->name_en : $user->generalSpecialization->name_ar}}</td>
                        <th>@lang('public.job_description')</th>
                        <td>{{App::getlocale() == "en" ? $user->jobDescription->name_en : $user->jobDescription->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.fellowship')</th>
                        <td>{{App::getlocale() == "en" ? $user->fellowship->name_en : $user->fellowship->name_ar}}</td>
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
        <div class="title-with-table flex flex-column">
            <div class="tables-section">
                <div class="header-title">
                    <p>@lang('public.requests')</p>
                    <hr class="bar">
                </div>
                <div class="table flex flex-column">
                    @if(count($user->registerScholarships) > 0 || count($user->changeFellowshipScholarships) > 0 || count($user->changeSupervisorScholarships) > 0 || count($user->cancelscholarships) > 0 || count($user->extendScholarships) > 0)
                        <table class="requests">
                            <tr class="first-row">
                                <th>#@lang('public.order_number')</th>
                                <th>@lang('public.order_status')</th>
                                <th>@lang('public.type')</th>
                                <th>@lang('public.details')</th>
                            </tr>

                            @if(count($user->registerScholarships) > 0)
                                @foreach ($user->registerScholarships as $scholarship)
                                    @if($scholarship->registeration_type_id == 1)
                                        <tr>
                                            <td>{{$scholarship->id}}</td>
                                            <td>{{App::getlocale() == "en" ? $scholarship->status->name_en : $scholarship->status->name_ar}}</td>
                                            <td>{{App::getlocale() == "en" ? $scholarship->registerationType->name_en : $scholarship->registerationType->name_ar}}</td>
                                            <td><a href="{{route('admin.registerScholarship.show', $scholarship->id)}}" class="btn btn-primary">@lang('public.details')</a></td>
                                        </tr>
                                    @elseif($scholarship->registeration_type_id == 6)
                                        <tr>
                                            <td>{{$scholarship->id}}</td>
                                            <td>{{App::getlocale() == "en" ? $scholarship->status->name_en : $scholarship->status->name_ar}}</td>
                                            <td>{{App::getlocale() == "en" ? $scholarship->registerationType->name_en : $scholarship->registerationType->name_ar}}</td>
                                            <td><a href="{{route('admin.languageScholarship.show', $scholarship->id)}}" class="btn btn-primary">@lang('public.details')</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif

                            @if(count($user->changeFellowshipScholarships) > 0)
                                @foreach ($user->changeFellowshipScholarships as $scholarship)
                                    <tr>
                                        <td>{{$scholarship->id}}</td>
                                        <td>{{App::getlocale() == "en" ? $scholarship->status->name_en : $scholarship->status->name_ar}}</td>
                                        <td>{{App::getlocale() == "en" ? $scholarship->registerationType->name_en : $scholarship->registerationType->name_ar}}</td>
                                        <td><a href="{{route('admin.changeFellowshipScholarship.show', $scholarship->id)}}" class="btn btn-primary">@lang('public.details')</a></td>
                                    </tr>
                                @endforeach
                            @endif

                            @if(count($user->changeSupervisorScholarships) > 0)
                                @foreach ($user->changeSupervisorScholarships as $scholarship)
                                    <tr>
                                        <td>{{$scholarship->id}}</td>
                                        <td>{{App::getlocale() == "en" ? $scholarship->status->name_en : $scholarship->status->name_ar}}</td>
                                        <td>{{App::getlocale() == "en" ? $scholarship->registerationType->name_en : $scholarship->registerationType->name_ar}}</td>
                                        <td><a href="{{route('admin.changeSupervisorScholarship.show', $scholarship->id)}}" class="btn btn-primary">@lang('public.details')</a></td>
                                    </tr>
                                @endforeach
                            @endif

                            @if(count($user->cancelscholarships) > 0)
                                @foreach ($user->cancelscholarships as $scholarship)
                                    <tr>
                                        <td>{{$scholarship->id}}</td>
                                        <td>{{App::getlocale() == "en" ? $scholarship->status->name_en : $scholarship->status->name_ar}}</td>
                                        <td>{{App::getlocale() == "en" ? $scholarship->registerationType->name_en : $scholarship->registerationType->name_ar}}</td>
                                        <td><a href="{{route('admin.cancelScholarship.show', $scholarship->id)}}" class="btn btn-primary">@lang('public.details')</a></td>
                                    </tr>
                                @endforeach
                            @endif

                            
                            @if(count($user->extendScholarships) > 0)
                                @foreach ($user->extendScholarships as $scholarship)
                                    <tr>
                                        <td>{{$scholarship->id}}</td>
                                        <td>{{App::getlocale() == "en" ? $scholarship->status->name_en : $scholarship->status->name_ar}}</td>
                                        <td>{{App::getlocale() == "en" ? $scholarship->registerationType->name_en : $scholarship->registerationType->name_ar}}</td>
                                        <td><a href="{{route('admin.extendScholarship.show', $scholarship->id)}}" class="btn btn-primary">@lang('public.details')</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    @else
                    <p>@lang('public.does_not_have_a_request')</p>
                    @endif
                </div>
            </div>
        </div>


    </div>
@endsection