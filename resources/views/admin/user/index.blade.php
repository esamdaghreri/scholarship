@extends('admin.layouts.master')
@section('content')
    <div class="wrapper flex flex-column just-cont-flex-start al-items-center user-dashboard">
        <div class="title-with-table flex flex-column">
            <div class="tables-section">
                <div class="header-title flex flex-row">
                    <div>
                        <p>@lang('public.users')</p>
                        <hr class="bar">
                    </div>
                    <div>
                        <a class="open-add-modal"><i class="fas fa-user-plus fa-2x"></i></a>
                    </div>
                </div>
                <div class="table flex flex-column">
                    @php
                        $counter = 1;
                    @endphp
                    @if(count($users) > 0)
                        <table id="user-table">
                            <thead>
                                <tr class="first-row">
                                    <th>#</th>
                                    <th>@lang('public.email')</th>
                                    <th>@lang('public.national__or_residence_number')</th>
                                    <th>@lang('public.gender')</th>
                                    <th>@lang('public.nationality')</th>
                                    <th>@lang('auth.email_verified')</th>
                                    <th>@lang('public.created_at')</th>
                                    <th></th>
                                </tr>
                            <thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td>{{$user->email}}</td>
                                        @if(is_null($user->national_number) || is_null($user->gender) || is_null($user->nationality))
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @else
                                            <td>{{$user->national_number}}</td>
                                            <td>{{App::getlocale() == "en" ? $user->gender->name_en : $user->gender->name_ar}}</td>
                                            <td>{{App::getlocale() == "en" ? $user->nationality->name_en : $user->nationality->name_ar}}</td>
                                        @endif
                                        @if(is_null($user->email_verified_at))
                                            <td>@lang('auth.not_verified')</td>
                                        @else
                                            <td>@lang('auth.verified')</td>
                                        @endif
                                        <td>{{$user->created_at}}</td>
                                        <td><a href="{{route('admin.user.show', $user->id)}}"><i class="fas fa-eye"></i></a><a href="{{route('admin.user.edit', $user->id)}}"><i class="fas fa-user-edit"></i></a>@if($user->is_banned == 0)<a href="#" id="{{$user->id}}" class="open-banned-modal for-banned"><i class="fas fa-user-times"></i></a>@else <a href="#" id="{{$user->id}}" class="open-banned-modal for-unbanned"><i class="fas fa-user-check"></i></a>@endif</td> 
                                    </tr>
                                    @php
                                        $counter += 1;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>@lang('public.no_users_available')</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
     {{-- Start by default hidden --}}
     <div id="add-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>@lang('public.add_user')</h2>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.user.store')}}" method="POST">
                    @csrf
                    <div class="input-field">
                        <label>@lang('public.email')</label>
                        <input type="email" name="email" class="input-text @if($errors->has('email'))input-error @endif"  placeholder="example@scholarship.com" value="{{ \Illuminate\Support\Facades\Request::old('email') }}"required>
                    </div>
                    <div class="input-field">
                        <label>@lang('public.username')</label>
                        <input type="text" name="username" class="input-text @if($errors->has('username'))input-error @endif"  placeholder="scholarship" value="{{ \Illuminate\Support\Facades\Request::old('username') }}" required>
                    </div>
                    <div class="input-field">
                        <label>@lang('public.role')</label>
                        <select name="role" class="input-text @if($errors->has('role'))input-error @endif" required>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{App::getlocale() == "en" ? $role->name_en : $role->name_ar}}</option>
                            @endforeach
                        </select>  
                    </div>
                    <div class="input-field">
                        <label>@lang('public.gender')</label>
                        <select name="gender" class="input-text">
                            <option value="1" selected>@lang('public.male')</option>
                            <option value="2">@lang('public.female')</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>@lang('public.nationality')</label>
                        <select name="nationality" class="input-text @if($errors->has('nationality'))input-error @endif" required>
                            @foreach ($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{App::getlocale() == "en" ? $nationality->name_en : $nationality->name_ar}}</option>
                            @endforeach
                        </select>  
                    </div>
                    <div class="input-field">
                        <label>@lang('public.password')</label>
                        <input type="password" name="password" class="input-text @if($errors->has('password'))input-error @endif" placeholder="*******" required>
                    </div>
                    <div class="input-field">
                        <label>@lang('public.re_password')</label>
                        <input type="password" name="password_confirmation" class="input-text" placeholder="*******" required>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('public.add')</button>
                </form>
            </div>
        </div>
    </div>

    <div id="banned-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>@lang('public.banned_user')</h2>
            </div>
            <div class="modal-body flex flex-column center-center">
                <p class="modal-message">@lang('public.are_you_sure_to_banned_him')</p>
                <form class="flex flex-column center-center">
                    <div class="input-field flex flex-row center-center">
                        <label>@lang('public.reason')</label>
                        <textarea name="reason" id="banned-message" class="input-textarea" required></textarea>
                    </div>
                    <div class="flex flex-row button-space">
                        <button type="submit" id="banned-btn" class="btn btn-cancel">@lang('public.yes')</button> <button class="close btn btn-primary">@lang('public.cancel')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="unbanned-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>@lang('public.unbanned_user')</h2>
            </div>
            <div class="modal-body flex flex-column center-center">
                <p class="modal-message">@lang('public.are_you_sure_to_unbanned_him')</p>
                <form class="flex flex-column center-center">
                    <div class="input-field flex flex-row center-center">
                        <label>@lang('public.reason')</label>
                        <textarea name="reason" id="unbanned-message" class="input-textarea" required></textarea>
                    </div>
                    <div class="flex flex-row button-space">
                        <button type="submit" id="unbanned-btn" class="btn btn-cancel">@lang('public.yes')</button> <button class="close btn btn-primary">@lang('public.cancel')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End by default hidden --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let add_modal = $('#add-modal')[0];
            let banned_modal = $('#banned-modal')[0];
            let user_id;
            let banned_reason;

            // When the user clicks on any open modal button
            $('.open-add-modal').click(function(){
                $('#add-modal').css('display', 'block');
            });

            $('.open-banned-modal.for-banned').click(function(){
                user_id = $(this).attr('id')
                $('#banned-modal').css('display', 'block');
            });

            $('.open-banned-modal.for-unbanned').click(function(){
                user_id = $(this).attr('id')
                $('#unbanned-modal').css('display', 'block');
            });

            $('#banned-btn').click(function(e){
                e.preventDefault();
                banned_reason = $('textarea#banned-message').val();
                $.ajax({
                    type: "POST",
                    url:"users/banned",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id:  user_id,
                        reason: banned_reason
                    },
                    success:function(data)
                    {
                        if($.isEmptyObject(data.errors)){
                            $('#banned-btn').text('banned...');
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

            $('#unbanned-btn').click(function(e){
                e.preventDefault();
                banned_reason = $('textarea#unbanned-message').val();
                $.ajax({
                    type: "POST",
                    url:"users/banned",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id:  user_id,
                        reason: banned_reason
                    },
                    success:function(data)
                    {
                        if($.isEmptyObject(data.errors)){
                            $('#unbanned-btn').text('Unbanned...');
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
            $('.close').click(function() {
                $('.modal').css('display', 'none');
            });

            // When the user clicks anywhere outside of the add modal, close it
            $(window).click(function(event){
                if (event.target == add_modal) {
                    $('#add-modal').css('display', 'none');
                }
                if (event.target == banned_modal) {
                    $('#banned-modal').css('display', 'none');
                }
            });
        });
    </script>
@endsection