@extends('user.layouts.master')

@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center">
        <div class="back-button flex flex-column just-cont-flex-start">
            <a href="{{route('user.home')}}" class="btn btn-primary">@lang('public.back')</a>
        </div>
        <div class="title-with-table flex flex-column">
            <div class="tables-section">
                <div class="header-title">
                    <p>@lang('public.my_orders')</p>
                    <hr class="bar">
                </div>
                <div class="table flex flex-column">
                    @if(count($orders[0]) > 0 || count($orders[1]) > 0)
                    <table>
                        <tr class="first-row">
                            <th>#@lang('public.order_number')</th>
                            <th>@lang('public.order_status')</th>
                            <th>@lang('public.type')</th>
                            <th>@lang('public.details')</th>
                        </tr>
                        @foreach ($orders as $order)
                            @foreach ($order as $single_type)
                                <tr>
                                    <td>{{$single_type->id}}</td>
                                    <td>{{App::getlocale() == "en" ? $single_type->status->name_en : $single_type->status->name_ar}}</td>
                                    <td>{{App::getlocale() == "en" ? $single_type->registerationType->name_en : $single_type->registerationType->name_ar}}</td>
                                    @if($single_type->registeration_type_id == 1)
                                        <td><a href="{{route('register.show', $single_type->id)}}" class="btn btn-primary">@lang('public.details')</a></td>
                                    @elseif($single_type->registeration_type_id == 3)
                                        <td><a href="{{route('cancel.show', $single_type->id)}}" class="btn btn-primary">@lang('public.details')</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                        @else
                            <p>@lang('public.you_have_no_order')</p>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection