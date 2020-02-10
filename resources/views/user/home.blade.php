@extends('user.layouts.master')
@section('content')
    <div class="homepage flex center-center flex-column">
        <section class="hero-section flex center-center flex-column">
            <p>@lang('public.title')</p>
            <a href="#" class="btn btn-primary">@lang("public.register")</a>
        </section>
        <section class="instruction_cards flex center-center flex-column">
            <div class="card">
                <div class="card-container">
                    <div class="upper-container">
                        <div class="image-container flex center-center">
                            <img src="{{asset('assets/images/accept.png')}}" alt="accept_step"/>
                        </div>
                    </div>
                    <div class="lower-container">
                        <div>
                            <h2>@lang('public.third_step')</h2>
                            <p>@lang('public.third_step_explanation')</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-container">
                    <div class="upper-container">
                        <div class="image-container flex center-center">
                            <img src="{{asset('assets/images/fill.png')}}" alt="fill_step"/>
                        </div>
                    </div>
                    <div class="lower-container">
                        <div>
                            <h2>@lang('public.second_step')</h2>
                            <p>@lang('public.second_step_explanation')</p>
                        </div>
                    </div>
                </div>

                <div class="card-container">
                    <div class="upper-container">
                        <div class="image-container flex center-center">
                            <img src="{{asset('assets/images/register_new.png')}}" alt="register_step"/>
                        </div>
                    </div>
                    <div class="lower-container">
                        <div>
                            <h2>@lang('public.first_step')</h2>
                            <p>@lang('public.first_step_explanation')</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="suggestion flex center-center flex-column">
            <p>@lang('public.any_note_feel_free_to_let_us_know')</p>
            <form action="/suggestion" method="post" class="flex center-center flex-column">
                @csrf
                <input type="email" name="email" class="input-text" placeholder="scholarship@example.com"/>
                <input type="text" name="name" class="input-text" placeholder="@lang('public.your_name')"/>
                <textarea name="content" class="input-textarea" placeholder="@lang('public.your_commend')"></textarea>
                <button type="submit" name="submit" class="btn btn-primary">@lang('public.send')</button>
            </form>
        </section>
    </div>
@endsection