@extends('user.layouts.master')

@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center">
        <div class="back-button flex flex-column just-cont-flex-start">
            <a href="{{route('personnel.showOrders')}}" class="btn btn-primary">@lang('public.back')</a>
        </div>
        <div class="title-with-table flex flex-column">
            <div class="tables-section">
                <div class="header-title">
                    <p>{{App::getlocale() == "en" ? $order->registerationType->name_en : $order->registerationType->name_ar}}</p>
                    <hr class="bar">
                </div>
                <table class="flex flex-column details">
                    <tr class="contant-method">
                        <th>@lang('public.personnel_data')</th>
                    </tr>
                    <tr>
                        <th>@lang('public.name')</th>
                        <td>{{$order->user->first_name . ' ' . $order->user->second_name . ' ' . $order->user->third_name . ' ' . $order->user->fourth_name}}</td>
                        <th>@lang('public.country')</th>
                        <td>{{App::getlocale() == "en" ? $order->registerScholarship->country->name_en : $order->registerScholarship->country->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.national__or_residence_number')</th>
                        <td>{{$order->user->national_number}}</td>
                        <th>@lang('public.university')</th>
                        <td>{{App::getlocale() == "en" ? $order->registerScholarship->university->name_en : $order->registerScholarship->university->name_ar}}</td>
                    </tr>
                    <tr class="contant-method">
                        <th>@lang('public.information_about_the_scholarship')</th>
                    </tr>
                    <tr>
                        <th>#@lang('public.order_number')</th>
                        <td>{{$order->registerScholarship->id}}</td>
                        <th>@lang('public.college')</th>
                        <td>{{App::getlocale() == "en" ? $order->registerScholarship->college->name_en : $order->registerScholarship->college->name_ar}}</td>
                    </tr>
                    @if($order->registerScholarship->registeration_type_id == 1)
                        <tr>
                            <th>@lang('public.order_status')</th>
                            <td>{{App::getlocale() == "en" ? $order->status->name_en : $order->status->name_ar}}</td>
                            <th>@lang('public.specialist')</th>
                            <td>{{App::getlocale() == "en" ? $order->registerScholarship->specialist->name_en : $order->registerScholarship->specialist->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>@lang('public.created_at')</th>
                            <td>{{date('Y-m-d', strtotime($order->created_at))}}</td>
                            <th>@lang('public.qualification')</th>
                            <td>{{App::getlocale() == "en" ? $order->registerScholarship->qualification->name_en : $order->registerScholarship->qualification->name_ar}}</td>
                        </tr>
                    @elseif($order->registerScholarship->registeration_type_id == 6)
                        <tr>
                            <th>@lang('public.created_at')</th>
                            <td>{{date('Y-m-d', strtotime($order->created_at))}}</td>
                            <th>@lang('public.order_status')</th>
                            <td>{{App::getlocale() == "en" ? $order->status->name_en : $order->status->name_ar}}</td>
                        </tr>
                    @endif
                    <tr class="contant-method">
                        <th>@lang('public.information_about_extend_scholarship')</th>
                    </tr>
                    <tr>
                        <th>@lang('public.reason')</th>
                        <td>{{App::getlocale() == "en" ? $order->scholarshipReason->name_en : $order->scholarshipReason->name_ar}}</td>
                        <th>@lang('public.otherـreason')</th>
                        <td>{{$order->other_reason ? $order->other_reason  : trans('public.there_is_no_other_reason')}}</td>
                    </tr>
                    <tr class="contant-method">
                        <th>@lang('public.contact_methods')</th>
                    </tr>
                    <tr>
                        <th>@lang('public.email')</th>
                        <td>{{$order->user->email}}</td>
                        <th>@lang('public.mobile_number')</th>
                        <td>{{$order->user->phone}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection