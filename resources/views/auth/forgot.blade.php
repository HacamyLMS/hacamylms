@extends('layouts.auth')

@section('content')
    <!-- Sing In Area Start -->
    <section class="sign-up-page p-0">
        <div class="container-fluid p-0">
            <div class="row">
            <div class="col-md-12">
                    <div class="sign-up-right-content" style="position: relative; overflow: hidden; opacity: 4.8;">
                        <video autoplay loop muted style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
                            <source src="{{ asset('uploads/video/hacamy-bg-video.mp4') }}" type="video/mp4">
                        </video>
                        <form method="POST" action="{{ route('forget-password.email') }}" style="background-color: #fff; padding: 30px; border-radius: 10px;">
                            <div class="sign-up-top-logo text-center">
                                <a href="{{ route('main.index') }}"><img src="{{getImageFile(get_option('app_black_logo'))}}" alt="logo"></a>
                            </div>
                            @csrf

                            
                            <div class="forgot-pass-text mb-25 mt-3">
                                <p class="mb-2">{{ __(get_option('forgot_subtitle')) }}</p>
                            </div>

                            <div class="row mb-30">
                                <div class="col-md-12">
                                    <label class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Email') }}</label>
                                    <input type="email" name="email" class="form-control" placeholder="{{ __('Type your email') }}">
                                </div>
                            </div>
                            <div class="row mb-30">
                                <div class="col-md-12">
                                    <button type="submit" class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100">{{ __(get_option('forgot_btn_name')) }}</button>
                                </div>
                            </div>
                            <div class="row mb-30">
                                <div class="col-md-12"><a href="{{ route('login') }}" class="color-hover text-decoration-underline font-medium">{{ __('Back to Login?') }}</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sing In Area End -->
@endsection
