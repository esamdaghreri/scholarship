@extends('admin.layouts.master')
@section('content')
    <div class="wrapper report-dashboard flex flex-column just-cont-flex-start al-items-center">
        <div class="search-section flex flex-column">
            <div class="header-title">
                <div>
                    <p>@lang('public.search')</p>
                    <hr class="bar">
                </div>
            </div>
            <div class="fields flex flex-center-center">
                <form action="" class="flex flex-column center-center">
                    <div class="flex flex-row center-center">

                        <div class="date-field flex flex-row">
                            <div class="date-types flex flex-column">
                                <div class="flex flex-row center-center type">
                                    <input type="checkbox" name="born-date" value="born-date">
                                    <label for="born-date">@lang('public.born-date')</label>
                                </div>
                                <div class="flex flex-row center-center">
                                    <input type="checkbox" name="request-date" value="request-date">
                                    <label for="request-date">@lang('public.request-date')</label>
                                </div>
                            </div>
                            <div class="input-field from">
                                <label for="from">@lang('public.from')</label>
                                <input class="input-text" type="date" name="from-date">
                            </div>
                            <div class="input-field to">
                                <label for="to">@lang('public.to')</label>
                                <input class="input-text" type="date" name="to-date">
                            </div>
                        </div>

                        <p class="or">@lang('public.or')</p>

                        <div class="input-field department-field">
                            <label for="type-of-department">@lang('public.type-of-department')</label>
                            <select name="department" class="input-text">
                                <option value="all">@lang('public.all')</option>
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{App::getlocale() == "en" ? $department->name_en : $department->name_ar}}</option>
                                @endforeach
                            </select>  
                        </div>

                        <p class="or">@lang('public.or')</p>

                        <div class="input-field request-field">
                            <label for="type-of-request">@lang('public.type-of-request')</label>
                            <select name="request" class="input-text">
                                <option value="all">@lang('public.all')</option>
                                <option value="new-scholarship">@lang('public.new_scholarship')</option>
                                <option value="language">@lang('public.language_scholarship')</option>
                                <option value="extend">@lang('public.extend_scholarship')</option>
                                <option value="cancel">@lang('public.cancel_scholarship')</option>
                                <option value="change-supervisor">@lang('public.change_supervisor')</option>
                                <option value="change-fellowship">@lang('public.change_fellowship')</option>
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
                            @php
                                $counter = 1;
                            @endphp
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
                                            <td>{{$counter}}</td>
                                            <td>{{$user->first_name . ' ' . $user->second_name . ' ' . $user->third_name . ' ' . $user->fourth_name}}</td>
                                            <td>{{$user->national_number}}</td>
                                            <td>{{$user->employee_number}}</td>
                                            <td><a href="{{route('admin.user.show', $user->id)}}"><i class="fas fa-eye"></i></a></td> 
                                        </tr>
                                        @php
                                            $counter += 1;
                                        @endphp
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
    </div>
@endsection