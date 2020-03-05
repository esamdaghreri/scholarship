@extends('user.layouts.master')

@section('content')
    <div class="form-container change-supervisor-scholarship flex center-center">
        <form action="{{ route('changeSupervisor.store')}}" method="POST" class="flex center-center flex-column">
            <p>@lang('public.order_number'): {{$register_id->id}}</p>
            <div class="form-sample flex flex-row">
                @csrf
                <div class="label-side flex flex-column">
                    <label class="textarea-position flex al-items-center">@lang('public.reason')</label>
                </div>
                <div class="input-side flex flex-column">
                    <textarea name="reason" class="input-textarea @if($errors->has('reason'))input-error @endif"></textarea>
                    <input type="hidden" name="register_id" value="{{$register_id->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                </div>
            </div>
            <div class="accept-terms">
                <label>@lang('public.accept_all_terms_and_conditions')</label>
                <input type="checkbox" name="terms_and_condition" required>
            </div>
            <button class="btn btn-primary">@lang('public.change_supervisor')</button>
        </form>
    </div>
@endsection