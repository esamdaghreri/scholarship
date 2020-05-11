@extends('admin.layouts.master')
@section('content')
    <div class="wrapper report-dashboard flex flex-column just-cont-flex-start al-items-center">
        @include('user..error.alert-form-message')
        <div class="search-section flex flex-column">
            <div class="header-title">
                <div>
                    <p>@lang('public.search')</p>
                    <hr class="bar">
                </div>
            </div>
            <div class="fields flex flex-center-center">
                <form action="{{route('admin.report.search')}}" method="GET" class="flex flex-column center-center">
                    <div class="flex flex-row center-center">

                        <div class="date-field flex flex-row">
                            <div class="date-types flex flex-column">
                                @if(isset($date_type))
                                    @if($date_type == 'born')
                                        <div class="flex flex-row center-center type">
                                            <input checked="checked" type="radio" name="date_type" value="born">
                                            <label for="date_type">@lang('public.born-date')</label>
                                        </div>
                                        <div class="flex flex-row center-center">
                                            <input type="radio" name="date_type" value="request">
                                            <label for="date_type">@lang('public.request-date')</label>
                                        </div>
                                    @elseif($date_type == 'request')
                                        <div class="flex flex-row center-center type">
                                            <input type="radio" name="date_type" value="born">
                                            <label for="date_type">@lang('public.born-date')</label>
                                        </div>
                                        <div class="flex flex-row center-center">
                                            <input checked="checked"  type="radio" name="date_type" value="request">
                                            <label for="date_type">@lang('public.request-date')</label>
                                        </div>
                                    @endif
                                @else
                                    <div class="flex flex-row center-center type">
                                        <input type="radio" name="date_type" value="born">
                                        <label for="date_type">@lang('public.born-date')</label>
                                    </div>
                                    <div class="flex flex-row center-center">
                                        <input type="radio" name="date_type" value="request">
                                        <label for="date_type">@lang('public.request-date')</label>
                                    </div>
                                @endif
                            </div>
                            <div class="input-field from">
                                <label for="from">@lang('public.from')</label>
                                <input class="input-text" type="date" name="from_date" @if(isset($from_date)) value={{$from_date}}@endif>
                            </div>
                            <div class="input-field to">
                                <label for="to">@lang('public.to')</label>
                                <input class="input-text" type="date" name="to_date" @if(isset($to_date)) value={{$to_date}}@endif>
                            </div>
                        </div>

                        <div class="input-field department-field">
                            <label for="type-of-registration">@lang('public.type-of-registeration')</label>
                            <select name="registeration" class="input-text">
                                <option value="all">@lang('public.all')</option>
                                @foreach ($registeration_type as $single_type)
                                    <option 
                                        @if(isset($registeration))
                                            @if($single_type->model_name == $registeration)
                                                selected="selected" 
                                            @endif
                                        @endif
                                        value="{{$single_type->model_name}}" 
                                    >
                                    {{App::getlocale() == "en" ? $single_type->name_en : $single_type->name_ar}}</option>
                                @endforeach
                            </select>  
                        </div>

                        <div class="input-field department-field">
                            <label for="type-of-department">@lang('public.type-of-department')</label>
                            <select name="department" class="input-text">
                                <option value="all">@lang('public.all')</option>
                                @foreach ($departments as $department)
                                    <option 
                                    @if(isset($deptm))
                                        @if($department->id == $deptm)
                                            selected="selected" 
                                        @endif
                                    @endif
                                    value="{{$department->id}}" 
                                >
                                {{App::getlocale() == "en" ? $department->name_en : $department->name_ar}}</option>
                                @endforeach
                            </select>  
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('public.search')</button>
                </form>
            </div>
        </div>

        @if(isset($users))
            @if(count($users) > 0)
                <div class="title-with-table flex flex-column">
                    <div class="tables-section">
                        <div class="header-title flex flex-row">
                            <div>
                                <p>@lang('public.reports')</p>
                                <hr class="bar">
                            </div>
                        </div>
                        <div class="table flex flex-column">
                            <table id="user-table">
                                <thead>
                                    <tr class="first-row">
                                        <th>#</th>
                                        <th>@lang('public.name')</th>
                                        <th>@lang('public.national__or_residence_number')</th>
                                        <th>@lang('public.employee_number')</th>
                                        <th></th>
                                    </tr>
                                <thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->first_name . ' ' . $user->second_name . ' ' . $user->third_name . ' ' . $user->fourth_name}}</td>
                                            <td>{{$user->national_number}}</td>
                                            <td>{{$user->employee_number}}</td>
                                            <td><a href="{{route('admin.report.show', $user->id)}}"><i class="fas fa-eye"></i></a></td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <p class="no-result">@lang('public.no_results')</p>
            @endif
        @endif
        @if(isset($users))
            {{ $users->appends(['date_type' => $date_type, 'from_date' => $from_date, 'to_date' => $to_date, 'registeration' => $registeration, 'department' => $deptm])->links() }}
        @endif
    </div>
@endsection