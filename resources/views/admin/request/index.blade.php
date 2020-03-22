@extends('admin.layouts.master')
@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center user-dashboard">
        <div class="title-with-table flex flex-column">
            <div class="tables-section">
                <div class="header-title flex flex-row">
                    <div>
                        <p>@lang('public.requests')</p>
                        <hr class="bar">
                    </div>
                </div>
                <div class="table flex flex-column">
                    @if(count($requests[0]) > 0 || count($requests[1]) > 0 || count($requests[2]) > 0 || count($requests[3]) > 0 || count($requests[4]) > 0)
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
                                    @foreach ($request as $single_type)
                                        <tr>
                                            <td>{{$single_type->id}}</td>
                                            <td>{{App::getlocale() == "en" ? $single_type->status->name_en : $single_type->status->name_ar}}</td>
                                            <td>{{App::getlocale() == "en" ? $single_type->registerationType->name_en : $single_type->registerationType->name_ar}}</td>
                                            <td>{{$single_type->created_at}}</td>
                                            @if($single_type->registeration_type_id == 1)
                                                <td><a href="{{route('admin.register.show', $single_type->id)}}"><i class="fas fa-eye"></i></a></td> 
                                            @elseif($single_type->registeration_type_id == 2)
                                                <td><a href="{{route('admin.extend.show', $single_type->id)}}"><i class="fas fa-eye"></i></a></td> 
                                            @elseif($single_type->registeration_type_id == 3)
                                                <td><a href="{{route('admin.cancel.show', $single_type->id)}}"><i class="fas fa-eye"></i></a></td> 
                                            @elseif($single_type->registeration_type_id == 4)
                                                <td><a href="{{route('admin.changeSupervisor.show', $single_type->id)}}"><i class="fas fa-eye"></i></a></td> 
                                            @elseif($single_type->registeration_type_id == 5)
                                            <td><a href="{{route('admin.changeFellowship.show', $single_type->id)}}"><i class="fas fa-eye"></i></a></td> 
                                            @elseif($single_type->registeration_type_id == 6)
                                                <td><a href="{{route('admin.languageScholarship.show', $single_type->id)}}"><i class="fas fa-eye"></i></a></td> 
                                            @endif
                                            <td><a href="{{route('admin.request.show', $single_type->id)}}"><i class="fas fa-eye"></i></a></td> 
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>@lang('public.no_requests_available')</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection