@extends('user.layouts.form')

@section('content')
    <div class="form-container extend-scholarship flex center-center">
        <form action="{{ route('extend.store')}}" method="POST" class="flex center-center flex-column">
            @include('user.error.alert-form-message')
            <p>@lang('public.order_number'): {{$register_id->id}}</p>
            <div class="form-sample flex flex-row">
                @csrf
                <div class="label-side flex flex-column">
                    <label>@lang('public.number_of_times_for_extend')</label>
                    <label>@lang('public.reason')</label>
                    <label class="textarea-label flex al-items-center">@lang('public.otherـreason') (<small>@lang('public.optional'))</small></label>
                </div>
                <div class="input-side flex flex-column">
                    <select name="number_for_extend" class="input-text @if($errors->has('number_for_extend'))input-error @endif" required>
                        <option value="1">@lang('public.first_time')</option>
                        <option value="2">@lang('public.second_time')</option>
                    </select>
                    <select name="reason" class="input-text @if($errors->has('reason'))input-error @endif" required>
                        @foreach ($scholarship_reasons as $reason)
                            <option value="{{$reason->id}}">{{App::getlocale() == "en" ? $reason->name_en : $reason->name_ar}}</option>
                        @endforeach
                    </select>
                    <textarea name="other_reason" class="input-textarea @if($errors->has('other_reason'))input-error @endif" value="{{$user_information->fourth_name ?? \Illuminate\Support\Facades\Request::old('other_reason')}}"></textarea>
                    <input type="hidden" name="register_id" value="{{$register_id->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                </div>
            </div>
            <div class="accept-terms">
                <label>@lang('public.accept_all_terms_and_conditions')</label>
                <input type="checkbox" name="terms_and_condition" required>
            </div>
            <button class="btn btn-primary">@lang('public.extend_scholarship')</button>
        </form>
    </div>
@endsection