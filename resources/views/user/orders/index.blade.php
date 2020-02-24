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
                    @if(count($orders) > 0)
                    <table>
                        <tr class="first-row">
                            <th>#@lang('public.order_number')</th>
                            <th>@lang('public.order_status')</th>
                            <th>@lang('public.details')</th>
                        </tr>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                @foreach($statuses as $status)
                                    @if($order->status_id == $status->id)
                                        <td>{{App::getlocale() == "en" ? $status->name_en : $status->name_ar}}</td>
                                    @endif
                                @endforeach
                                <td><a href="{{route('scholarship.show', $order->id)}}" class="btn btn-primary">@lang('public.details')</a></td>
                            </tr>
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