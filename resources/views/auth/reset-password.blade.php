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
                        <form method="POST" action="{{ route('reset-password') }}" style="background-color: #fff; padding: 30px; border-radius: 10px;">
                            <div class="sign-up-top-logo text-center">
                                <a href="{{ route('main.index') }}"><img src="{{getImageFile(get_option('app_black_logo'))}}" alt="logo"></a>
                            </div>
                            @csrf

                            <h5 class="mb-25">{{ __('Reset Password') }}</h5>
                            <p>*{{ __('Verification code sent your email. Please check.') }}</p> <br>
                            <div class="row mb-30">
                                <div class="col-md-12">
                                    <label class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Verification Code') }}</label>
                                    <div class="form-group mb-0 position-relative">
                                        <input class="form-control " name="verification_code" placeholder="{{ __('Type your verification code') }}" type="number" required>
                                    </div>
                                    @if ($errors->has('verification_code'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('verification_code') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-30">
                                <div class="col-md-12">
                                    <label class="label-text-title color-heading font-medium font-16 mb-3">{{ __('New Password') }}</label>
                                    <div class="form-group mb-0 position-relative">
                                        <input class="form-control password" name="password" placeholder="*********" type="password" required>
                                        <span class="toggle cursor fas fa-eye pass-icon"></span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-30">
                                <div class="col-md-12">
                                    <label class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Confirm Password') }}</label>
                                    <div class="form-group mb-0 position-relative">
                                        <input class="form-control password" name="password_confirmation" placeholder="*********" type="password" required>
                                        <span class="toggle cursor fas fa-eye pass-icon"></span>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-30">
                                <div class="col-md-12">
                                    <button type="submit" class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100">{{ __('Change Password') }}</button>
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
