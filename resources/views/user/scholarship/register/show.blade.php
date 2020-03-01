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
                    <tr>
                        <th>@lang('public.name')</th>
                        <td>{{$order->user->first_name . ' ' . $order->user->second_name . ' ' . $order->user->third_name . ' ' . $order->user->fourth_name}}</td>
                        <th>@lang('public.country')</th>
                        <td>{{App::getlocale() == "en" ? $order->country->name_en : $order->country->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.national_number')</th>
                        <td>{{$order->user->national_number}}</td>
                        <th>@lang('public.university')</th>
                        <td>{{App::getlocale() == "en" ? $order->university->name_en : $order->university->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>#@lang('public.order_number')</th>
                        <td>{{$order->id}}</td>
                        <th>@lang('public.college')</th>
                        <td>{{App::getlocale() == "en" ? $order->college->name_en : $order->college->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.order_status')</th>
                        <td>{{App::getlocale() == "en" ? $order->status->name_en : $order->status->name_ar}}</td>
                        <th>@lang('public.specialist')</th>
                        <td>{{App::getlocale() == "en" ? $order->specialist->name_en : $order->specialist->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.created_at')</th>
                        <td>{{date('Y-m-d', strtotime($order->created_at))}}</td>
                        <th>@lang('public.qualification')</th>
                        <td>{{App::getlocale() == "en" ? $order->qualification->name_en : $order->qualification->name_ar}}</td>
                    </tr>
                    <tr class="contant-method">
                        <th>@lang('public.contact_methods')</th>
                    </tr>
                    <tr>
                        <th>@lang('public.email')</th>
                        <td>{{$order->user->email}}</td>
                        <th>@lang('public.phone_number')</th>
                        <td>{{$order->user->phone}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="cancel-extends-buttons flex">
            <a href="#" class="btn btn-primary">@lang('public.extend_scholarship')</a>
            <a href="#" class="btn btn-cancel">@lang('public.cancel_scholarship')</a>
        </div>
    </div>
@endsection