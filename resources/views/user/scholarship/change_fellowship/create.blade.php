@extends('user.layouts.form')

@section('content')
    <div class="form-container change_fellowship flex center-center">
        <form action="{{ route('changeFellowship.store')}}" method="POST" class="flex center-center flex-column" enctype="multipart/form-data">
            @include('user.error.alert-form-message')
            <div class="form-sample flex flex-row">
                @csrf
                <div class="label-side flex flex-column">
                    <label>@lang('public.fellowship')</label>
                    <label>@lang('public.reason')</label>
                    <label class="textarea-label flex al-items-center">@lang('public.otherـreason') (<small>@lang('public.optional'))</small></label>
                    <label>@lang('public.attachment')</label>
                </div>
                <div class="input-side flex flex-column">
                    <?php unset($fellowships[0]) ?>
                    <select name="fellowship" class="input-text @if($errors->has('fellowship'))input-error @endif" required>
                        @foreach ($fellowships as $fellowship)
                            <option value="{{$fellowship->id}}">{{App::getlocale() == "en" ? $fellowship->name_en : $fellowship->name_ar}}</option>
                        @endforeach
                    </select>
                    <select name="reason" class="input-text @if($errors->has('reason'))input-error @endif" required>
                        @foreach ($scholarship_reasons as $reason)
                            <option value="{{$reason->id}}">{{App::getlocale() == "en" ? $reason->name_en : $reason->name_ar}}</option>
                        @endforeach
                    </select>
                    <textarea name="other_reason" class="input-textarea @if($errors->has('other_reason'))input-error @endif" value="{{$user_information->fourth_name ?? \Illuminate\Support\Facades\Request::old('other_reason')}}"></textarea>
                    <input type=file name="file[]" class="input-file" multiple>
                    <input type="hidden" name="register_id" value="{{$register_id->id}}">
                </div>
            </div>
            <div class="accept-terms">
                <label>@lang('public.accept_all_terms_and_conditions')</label>
                <input type="checkbox" name="terms_and_condition" required>
            </div>
            <button class="btn btn-primary">@lang('public.register')</button>
        </form>
    </div>
@endsection