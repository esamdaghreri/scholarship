@extends('user.layouts.master')
@section('content')
    <div class="verify flex center-center">
        <div class="box flex flex-column">
            <div class="up flex flex-row">
                <div class="showcase flex flex-column center-center">
                    <div class="showcase-content">
                        <p>@lang('auth.verify_your_email_address')</p>
                    </div>
                </div>
            </div>
            <div class="down flex flex-row">
                <div class="content flex flex-column center-center">
                    <p>@lang('auth.before_proceeding_please_check_your_email_for_a_verification_link')</p>
                    <p>@lang('auth.if_you_did_not_receive_the_email') <a href="{{ route('verification.resend')}}" onclick="event.preventDefault(); document.getElementById('resend_verify_email').submit();">@lang('auth.click_here_to_request_another')</a>.</p>
                </div>
            </div> 
        </div>
    </div>
    <form id="resend_verify_email" action="{{ route('verification.resend') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
