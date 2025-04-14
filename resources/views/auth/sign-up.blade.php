@extends('layouts.auth')

@section('content')
<!-- Sing Up Area Start -->
<section class="sign-up-page p-0">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
            <div class="sign-up-right-content removebrigu" style="position: relative; overflow: hidden; opacity: 4.8;">
                    <video autoplay loop muted style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
                        <source src="{{ asset('uploads/video/hacamy-bg-video.mp4') }}" type="video/mp4">
                    </video>
                    <form method="POST" action="{{route('store.sign-up')}}" style="background-color: #fff; padding: 30px; border-radius: 10px;">
                    <div class="sign-up-top-logo text-center">
                                <a href="{{ route('main.index') }}"><img src="{{getImageFile(get_option('app_black_logo'))}}" alt="logo" style="width: 200px;"></a>
                    </div>

                        @csrf
                        
                        <p class="font-14 mb-30 text-center">{{__('Already have an account?')}} <a href="{{route('login')}}"
                                class="color-hover text-decoration-underline font-medium">{{__('Sign In')}}</a></p>

                        <div class="row mb-20">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16"
                                    for="email">{{__('Email')}} <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" value="{{old('email')}}"
                                    class="form-control" placeholder="Type your email"
                                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                    oninput="this.value=this.value.replace(/\s/g,'')"
                                    title="{{ __('Please enter a valid email address (e.g., user@domain.com)') }}" 
                                    required>
                                @if ($errors->has('email'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                    $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-md-6">
                                <label class="label-text-title color-heading font-medium font-16"
                                    for="first_name">{{__('First Name')}} <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}"
                                    class="form-control" placeholder="{{__('First Name')}}"
                                    pattern="[^\s]+" oninput="this.value=this.value.replace(/\s/g,'')"
                                    title="{{ __('Spaces are not allowed') }}" required>
                                @if ($errors->has('first_name'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                    $errors->first('first_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="label-text-title color-heading font-medium font-16"
                                    for="last_name">{{__('Last Name')}} <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}"
                                    class="form-control" placeholder="{{__('Last Name')}}"
                                    pattern="[^\s]+" oninput="this.value=this.value.replace(/\s/g,'')"
                                    title="{{ __('Spaces are not allowed') }}" required>
                                @if ($errors->has('last_name'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                    $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16"
                                    for="password">{{__('Password')}} <span class="text-danger">*</span></label>

                                <div class="form-group mb-0 position-relative">
                                    <input type="password" name="password" id="password" value="{{old('password')}}"
                                        class="form-control password" placeholder="*********"
                                        pattern="^(?=.*[A-Za-z])(?=.*\d).{6,}$"
                                        title="{{ __('Password must be at least 6 characters long and include both letters and numbers') }}"
                                        required>
                                    <span class="toggle cursor fas fa-eye pass-icon"></span>
                                    <small class="form-text text-muted mt-1">
                                        {{ __('Minimum 6 characters, must contain 1 letter and 1 number') }}
                                    </small>
                                </div>

                                @if ($errors->has('password'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                    $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Role Selection -->
                        <div class="row mb-20 d-none">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16">{{__('Signup As')}} <span class="text-danger">*</span></label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="signup_as" id="roleStudent" value="student" checked>
                                        <label class="form-check-label" for="roleStudent">
                                            {{__('Student')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="signup_as" id="roleTutor" value="tutor">
                                        <label class="form-check-label" for="roleTutor">
                                            {{__('Tutor')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="signup_as" id="roleOrganization" value="organization">
                                        <label class="form-check-label" for="roleOrganization">
                                            {{__('Organization')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div class="row mb-20">
                            <div class="col-md-12">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" 
                                            name="terms" required>
                                        <label class="form-check-label mb-0" for="flexCheckChecked">
                                            By clicking Create Account, I agree that I have read and accepted the <a
                                                href="{{ route('terms-conditions') }}"
                                                class="color-hover text-decoration-underline">Terms of Use</a> and <a
                                                href="{{ route('privacy-policy') }}"
                                                class="color-hover text-decoration-underline">Privacy Policy.</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <button type="submit"
                                    class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100">{{__('Create Account')}}</button>
                            </div>
                        </div>

                        <script>
                            document.querySelector('form').addEventListener('submit', function(e) {
                                if (!document.getElementById('flexCheckChecked').checked) {
                                    e.preventDefault();
                                    alert("{{ __('Please accept the Terms of Use and Privacy Policy') }}");
                                }
                            });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sing Up Area End -->

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const selectedRole = document.querySelector('input[name="signup_as"]:checked').value;
            if (selectedRole === 'tutor' || selectedRole === 'organization') {
                localStorage.setItem('redirect_to_instructor', 'true');
            }
        });

        // Check if we need to redirect after successful registration
        if (document.referrer.includes('store.sign-up') && localStorage.getItem('redirect_to_instructor')) {
            localStorage.removeItem('redirect_to_instructor');
            window.location.href = "{{ route('student.become-an-instructor') }}";
        }
    </script>
@endsection