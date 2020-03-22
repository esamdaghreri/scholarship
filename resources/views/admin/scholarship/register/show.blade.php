@extends('admin.layouts.master')

@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center">
        <div class="back-button flex flex-column just-cont-flex-start">
            <a href="{{route('admin.request.index')}}" class="btn btn-primary">@lang('public.back')</a>
        </div>
        <div class="title-with-table flex flex-column">
            <div class="tables-section">
                <div class="header-title">
                    <p>{{App::getlocale() == "en" ? $request->registerationType->name_en : $request->registerationType->name_ar}}</p>
                    <hr class="bar">
                </div>
                <table class="flex flex-column details">
                    <tr class="contant-method">
                        <th>@lang('public.personnel_data')</th>
                    </tr>
                    <tr>
                        <th>@lang('public.email')</th>
                        <td>{{$request->user->email}}</td>
                        <th>@lang('public.username')</th>
                        <td>{{$request->user->username}}</td>
                        <th>@lang('public.role')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->role->name_en : $request->user->role->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.name')</th>
                        <td>{{$request->user->first_name . ' ' . $request->user->second_name . ' ' . $request->user->third_name . ' ' . $request->user->fourth_name}}</td>
                        <th>@lang('public.gender')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->gender->name_en : $request->user->gender->name_ar}}</td>
                        <th>@lang('public.national__or_residence_number')</th>
                        <td>{{$request->user->national_number}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.nationality')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->nationality->name_en : $request->user->nationality->name_ar}}</td>
                        <th>@lang('public.mobile_number')</th>
                        <td>{{$request->user->phone}}</td>
                        <th>@lang('public.telephone_number')</th>
                        <td>{{$request->user->telephone}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.employee_number')</th>
                        <td>{{$request->user->employee_number}}</td>
                        <th>@lang('public.date_of_joining_the_university')</th>
                        <td>{{date('Y-m-d', strtotime($request->user->date_of_joining_the_university))}}</td>
                        <th>@lang('public.highest_qualification')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->highestQualification->name_en : $request->user->highestQualification->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.graduation_country')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->graduationCountry->name_en : $request->user->graduationCountry->name_ar}}</td>
                        <th>@lang('public.graduation_university')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->graduationUniversity->name_en : $request->user->graduationUniversity->name_ar}}</td>
                        <th>@lang('public.graduation_college')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->graduationCollege->name_en : $request->user->graduationCollege->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.department')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->department->name_en : $request->user->department->name_ar}}</td>
                        <th>@lang('public.general_specialization')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->generalSpecialization->name_en : $request->user->generalSpecialization->name_ar}}</td>
                        <th>@lang('public.job_description')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->jobDescription->name_en : $request->user->jobDescription->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.fellowship')</th>
                        <td>{{App::getlocale() == "en" ? $request->user->fellowship->name_en : $request->user->fellowship->name_ar}}</td>
                    </tr>
                    <tr class="contant-method">
                        <th>@lang('public.information_about_the_scholarship')</th>
                    </tr>
                    <tr>
                        <th>#@lang('public.order_number')</th>
                        <td>{{$request->id}}</td>
                        <th>@lang('public.country')</th>
                        <td>{{App::getlocale() == "en" ? $request->country->name_en : $request->country->name_ar}}</td>
                    </tr>
                    <tr>                        
                        <th>@lang('public.qualification')</th>
                        <td>{{App::getlocale() == "en" ? $request->qualification->name_en : $request->qualification->name_ar}}</td>
                        <th>@lang('public.university')</th>
                        <td>{{App::getlocale() == "en" ? $request->university->name_en : $request->university->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.order_status')</th>
                        <td>{{App::getlocale() == "en" ? $request->status->name_en : $request->status->name_ar}}</td>
                        <th>@lang('public.college')</th>
                        <td>{{App::getlocale() == "en" ? $request->college->name_en : $request->college->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.created_at')</th>
                        <td>{{date('Y-m-d', strtotime($request->created_at))}}</td>
                        <th>@lang('public.fellowship')</th>
                        <td>{{App::getlocale() == "en" ? $request->fellowship->name_en : $request->fellowship->name_ar}}</td>
                    </tr>
                    <tr>
                        <th>@lang('public.updated_by')</th>
                        <td>{{$request->updated_by}}</td>
                        <th>@lang('public.updated_at')</th>
                        <td>{{$request->updated_at}}</td>
                    </tr>
                    @if($request->reject_reason)
                        <tr>
                            <th>@lang('public.reject_reason')</th>
                            <td>{{$request->reject_reason}}</td>
                        </tr>
                    @endif
                    <tr class="contant-method">
                        <th>@lang('public.attachment')</th>
                    </tr>
                    @foreach ($urls as $url)
                        <tr>
                            <td><a href="http://localhost:5555/storage/attachments/{{$url->title}}" target="_blank">{{$url->title}}</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="operation-scholarship-buttons flex">
            @if($request->status_id != 1)<button id="{{$request->id}}"  class="btn btn-primary open-approve-modal">@lang('public.approve')</button> @endif
            @if($request->status_id != 2)<button id="{{$request->id}}"  class="btn btn-cancel open-reject-modal">@lang('public.reject')</button> @endif
        </div>
    </div>
    {{-- Start default hidden --}}
    <div id="approve-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>@lang('public.approve')</h2>
            </div>
            <div class="modal-body flex flex-column center-center">
                <p class="modal-message">@lang('public.are_you_sure_to_approve_it')</p>
                <form class="flex flex-column center-center">
                    <div class="flex flex-row button-space">
                        <button type="submit" id="approve-btn" class="btn btn-primary">@lang('public.approve')</button> <button class="close btn btn-cancel">@lang('public.cancel')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="reject-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>@lang('public.reject')</h2>
            </div>
            <div class="modal-body flex flex-column center-center">
                <p class="modal-message">@lang('public.are_you_sure_to_reject_it')</p>
                <form class="flex flex-column center-center">
                    <div class="input-field flex flex-row center-center">
                        <label>@lang('public.reason')</label>
                        <textarea name="reason" id="reject-message" class="input-textarea" required></textarea>
                    </div>
                    <div class="flex flex-row button-space">
                        <button type="submit" id="reject-btn" class="btn btn-cancel">@lang('public.yes')</button> <button class="close btn btn-primary">@lang('public.cancel')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End default hidden --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let approve_modal = $('#approve-modal')[0];
            let reject_modal = $('#reject-modal')[0];
            let requerequest_idst_id;
            let reject_reason;

            // When the user clicks on any open modal button
            $('.open-approve-modal').click(function(){
                request_id = $(this).attr('id')
                $('#approve-modal').css('display', 'block');
            });

            $('.open-reject-modal').click(function(){
                request_id = $(this).attr('id')
                $('#reject-modal').css('display', 'block');
            });

            $('#approve-btn').click(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url:"/admin/dashboard/register/scholarship/approve",
                    data: {
                        _token: "{{ csrf_token() }}",
                        request_id:  request_id,
                    },
                    success:function(data)
                    {
                        if($.isEmptyObject(data.errors)){
                            $('#approve-btn').text('approved...');
                            setTimeout(function(){
                                location.reload();
                            }, 2000);
                        }
                        else 
                        {
                            jQuery.each(data.errors, function(key, value){
                                alert(value)
                            });
                        }
                    }
                });
            });

            $('#reject-btn').click(function(e){
                e.preventDefault();
                reject_reason = $('textarea#reject-message').val();
                $.ajax({
                    type: "POST",
                    url:"/admin/dashboard/register/scholarship/reject",
                    data: {
                        _token: "{{ csrf_token() }}",
                        request_id:  request_id,
                        reason: reject_reason
                    },
                    success:function(data)
                    {
                        if($.isEmptyObject(data.errors)){
                            $('#reject-btn').text('reject...');
                            setTimeout(function(){
                                location.reload();
                            }, 2000);
                        }
                        else 
                        {
                            jQuery.each(data.errors, function(key, value){
                                alert(value)
                            });
                        }
                    }
                });
            });

            // When the user clicks on <span> (x), close the modal
            $('.close').click(function(e) {
                e.preventDefault();
                $('.modal').css('display', 'none');
            });

            // When the user clicks anywhere outside of the add modal, close it
            $(window).click(function(event){
                if (event.target == approve_modal) {
                    $('#approve-modal').css('display', 'none');
                }
                if (event.target == reject_modal) {
                    $('#reject-modal').css('display', 'none');
                }
            });
        });
    </script>
@endsection