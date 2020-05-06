@extends('admin.layouts.master')
@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center user-dashboard">
        <div class="title-with-table flex flex-column">
            <div class="tables-section">
                <div class="header-title flex flex-row">
                    <div>
                        <p>@lang('public.change_fellowship_requests')</p>
                        <hr class="bar">
                    </div>
                </div>
                <div class="table flex flex-column">
                    @if(count($requests) > 0)
                        <table id="user-table">
                            <thead>
                                <tr class="first-row">
                                    <th>#@lang('public.order_number')</th>
                                    <th>@lang('public.order_status')</th>
                                    <th>@lang('public.type')</th>
                                    <th>@lang('public.request_time')</th>
                                    <th></th>
                                </tr>
                            <thead>
                            <tbody>
                                @foreach ($requests as $request)
                                    <tr>
                                        <td>{{$request->id}}</td>
                                        <td>{{App::getlocale() == "en" ? $request->status->name_en : $request->status->name_ar}}</td>
                                        <td>{{App::getlocale() == "en" ? $request->registerationType->name_en : $request->registerationType->name_ar}}</td>
                                        <td>{{$request->created_at}}</td>
                                        <td><a href="{{route('admin.changeFellowshipScholarship.show', $request->id)}}"><i class="fas fa-eye"></i></a></td> 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>@lang('public.no_requests_available')</p>
                    @endif
                </div>
            </div>
        </div>
        {{ $requests->links() }}
    </div>
@endsection