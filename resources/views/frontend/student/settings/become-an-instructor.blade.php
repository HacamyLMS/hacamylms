@extends('frontend.layouts.app')

@section('content')
    <div class="bg-page">
        <!-- Page Header Start -->
        <header class="page-banner-header gradient-bg position-relative">
            <div class="section-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="page-banner-content text-center">
                                <h3 class="page-banner-heading text-white pb-15">{{__('Switch Account Role')}}</h3>

                                <!-- Breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{__('Home')}}</a></li>
                                        <li class="breadcrumb-item font-14 active" aria-current="page">{{__('Switch Role')}}</li>
                                    </ol>
                                </nav>
                                <!-- Breadcrumb End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Header End -->

        <!-- Course Instructor and Support Area Start -->
        <section class="become-instructor-feature-area section-t-space">
            <div class="container">
                <div class="row become-instructor-feature-wrap">

                    @foreach($instructorFeatures as $instructorFeature)
                        <!-- Become Instructor Feature Item start-->
                        <div class="col-md-4">
                            <div class="become-instructor-feature-item bg-white theme-border">
                                <div class="instructor-support-img-wrap">
                                    <img src="{{ getImageFile($instructorFeature->image_path) }}" alt="support">
                                </div>
                                <h6>{{ __($instructorFeature->title) }}</h6>
                                <p>{{ __($instructorFeature->subtitle) }}</p>
                            </div>
                        </div>
                        <!-- Become Instructor Feature Item End-->
                    @endforeach

                </div>
                <div class="row">
                    <div class="d-flex justify-content-sm-center become-instructor-call-to-action align-items-center mt-50">
                        <button class="theme-btn theme-button1 theme-button3 mr-30" data-bs-toggle="modal" data-bs-target="#becomeAnInstructor"> {{__('Get Tutor Role')}} <i data-feather="arrow-right"></i></button>
                        <a href="{{route('contact')}}" class="text-decoration-underline font-15 font-medium"> {{__('Contact Us')}}</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Course Instructor and Support Area End -->

        <!-- Become an instructor Procedures Area Start -->
        <section class="become-an-instructor-procedures-area">
            <div class="container">

                @foreach($instructorProcedures as $instructorProcedure)
                    <!-- Become an instructor procedure item start-->
                    <div class="row become-an-instructor-procedure-item align-items-center">
                        <div class="col-md-6">
                            <div class="become-an-instructor-procedure-item-left overflow-hidden">
                                <img src="{{ getImageFile($instructorProcedure->image_path) }}" alt="about" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="become-an-instructor-procedure-item-right">
                                <div class="section-title">
                                    <h3 class="section-heading">{{ __($instructorProcedure->title) }}</h3>
                                </div>
                                <p class="mb-15">{{ __($instructorProcedure->subtitle) }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Become an instructor procedure item end-->
                @endforeach

            </div>
        </section>
        <!-- Become an instructor Procedures Area End -->

        <!-- Become Organization Call to action Area Start -->
        <section class="become-instructor-call-to-action section-t-space text-center" style="padding-top: 0px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section-heading">{{ __(get_option('app_instructor_footer_title')) }}</h3>
                        <div class="col-lg-6 mx-auto">
                            <p class="font-20 mb-4">{{ __(get_option('app_instructor_footer_subtitle')) }}</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{route('contact')}}" target="_blank" class="theme-btn theme-button1 theme-button3 mr-30"> {{__('Get Organization Role')}} <i data-feather="arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Counter Area Start -->
        <section class="counter-area bg-black section-t-space">
            <div class="container">
                <div class="row">
                    <!-- Counter Item start-->
                    <div class="col-md-6 col-lg-3">
                        <div class="counter-item d-flex align-items-center">
                            <div class="flex-shrink-0 counter-img-wrap">
                                <img src="{{asset('frontend/assets/img/icons-svg/counter-1.png')}}" alt="img">
                            </div>
                            <div class="flex-grow-1 ms-3 counter-content">
                                <h4 class="count-content" style="color: #fff !important;"><span class="counter">{{ @$total_students }}</span>+</h4>
                                <p class="font-14 font-medium color-gray mt-2" style="color: #fff !important;">{{ __('Students') }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Counter Item End-->

                    <!-- Counter Item start-->
                    <div class="col-md-6 col-lg-3">
                        <div class="counter-item d-flex align-items-center">
                            <div class="flex-shrink-0 counter-img-wrap">
                                <img src="{{asset('frontend/assets/img/icons-svg/counter-2.png')}}" alt="img">
                            </div>
                            <div class="flex-grow-1 ms-3 counter-content">
                                <h4 class="count-content" style="color: #fff !important;"><span class="counter">{{ @$total_enrollments }}</span></h4>
                                <p class="font-14 font-medium color-gray mt-2" style="color: #fff !important;">{{ __('Enrollments') }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Counter Item End-->

                    <!-- Counter Item start-->
                    <div class="col-md-6 col-lg-3">
                        <div class="counter-item d-flex align-items-center">
                            <div class="flex-shrink-0 counter-img-wrap">
                                <img src="{{asset('frontend/assets/img/icons-svg/counter-3.png')}}" alt="img">
                            </div>
                            <div class="flex-grow-1 ms-3 counter-content">
                                <h4 class="count-content" style="color: #fff !important;"><span class="counter">{{ @$total_instructors }}</span>+</h4>
                                <p class="font-14 font-medium color-gray mt-2" style="color: #fff !important;">{{ __('Tutors') }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Counter Item End-->

                    <!-- Counter Item start-->
                    <div class="col-md-6 col-lg-3">
                        <div class="counter-item d-flex align-items-center">
                            <div class="flex-shrink-0 counter-img-wrap">
                                <img src="{{asset('frontend/assets/img/icons-svg/counter-4.png')}}" alt="img">
                            </div>
                            <div class="flex-grow-1 ms-3 counter-content" style="color: #fff;">
                                <h4 class="count-content" style="color: #fff !important;"><span class="counter">99</span>%</h4>
                                <p class="font-14 font-medium color-gray mt-2" style="color: #fff !important;">{{ __('Satisfaction') }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Counter Item End-->

                </div>
            </div>
        </section>
        <!-- Counter Area End -->

        <!-- Become instructor Call to action Area Start -->
        <section class="become-instructor-call-to-action section-t-space text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="section-heading">Have Questions About Switching Roles?</h3>
                        <div class="col-lg-6 mx-auto">
                            <p class="font-20 mb-4">Our support team is here to guide you through the process.</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{route('contact')}}" target="_blank" class="theme-btn theme-button1 theme-button3 mr-30">Contact Support<i data-feather="arrow-right"></i></a>
                                <a href="{{route('support-ticket-faq')}}" target="_blank" class="text-decoration-underline font-15 font-medium">Visit Help Center</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Become a tutor Modal Start -->
    <div class="modal fade becomeAnInstructorModal" id="becomeAnInstructor" tabindex="-1" aria-labelledby="becomeAnInstructorLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-black">
                    <h6 class="modal-title text-center" id="becomeAnInstructorLabel" style="color: #fff;">{{ __('Switch to Tutor') }}</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{route('student.save-instructor-info')}}" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('First Name')}} <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control" id="first_name" 
                                    placeholder="{{__('Write your first name')}}" 
                                    value="{{ @Auth::user()->student->first_name }}"
                                    pattern="[^\s]+" 
                                    oninput="this.value=this.value.replace(/\s/g,'')"
                                    title="{{ __('Spaces are not allowed') }}"
                                    required>
                            </div>
                        </div>
                        
                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Last Name')}} <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" id="last_name" 
                                    placeholder="{{__('Write your last name')}}" 
                                    value="{{ @Auth::user()->student->last_name }}"
                                    pattern="[^\s]+" 
                                    oninput="this.value=this.value.replace(/\s/g,'')"
                                    title="{{ __('Spaces are not allowed') }}"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Account Type')}} <span class="text-danger">*</span></label>
                                <select class="form-control" name="account_type" required>
                                    <option value="{{ USER_ROLE_INSTRUCTOR }}">{{ __('Tutor') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Professional Title')}} <span class="text-danger">*</span></label>
                                <input type="text" name="professional_title" class="form-control text-capitalize" 
                                    id="professional_title" 
                                    placeholder="{{__('Professional Title')}}" 
                                    value="{{ old('professional_title') }}"
                                    oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase()"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Phone Number')}} <span class="text-danger">*</span></label>
                                <input type="tel" name="phone_number" class="form-control" id="phone_number" 
                                    placeholder="{{__('Phone Number')}}" 
                                    value="{{ old('phone_number') ?? @Auth::user()->student->phone_number }}"
                                    pattern="[0-9]+" 
                                    oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                                    title="{{ __('Only numbers are allowed') }}"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Address')}} <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" id="address" 
                                    placeholder="{{__('Address')}}" 
                                    value="{{ old('address') ?? @Auth::user()->student->address }}"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">CV <span class="text-danger">*</span></label>
                                <div class="create-assignment-upload-files">
                                    <input type="file" name="cv_file" 
                                        accept="application/pdf" 
                                        class="form-control"
                                        required 
                                        onchange="validateFileSize(this)"
                                    />
                                    <p class="font-14 color-heading text-center mt-2 color-gray">{{ __('Accepted format: PDF only') }} <span class="d-block">{{ __('Maximum File Upload Size is') }} <span class="color-heading">5MB</span></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{__('Bio')}} <span class="text-danger">*</span></label>
                                <textarea name="about_me" class="form-control" cols="30" rows="10" 
                                    placeholder="{{__('About yourself')}}" 
                                    required>{{ old('about_me') }}</textarea>
                            </div>
                        </div>

<script>
function validateFileSize(input) {
    if (input.files[0].size > 5242880) { // 5MB = 5242880 bytes
        alert("{{ __('File is too large. Maximum size is 5MB.') }}");
        input.value = '';
    }
}
</script>

                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center">
                        <button type="submit" class="theme-btn theme-button1 default-hover-btn" style="border: 2px black solid;">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Become an Instructor Modal End -->

@endsection

@push('script')
    @if (@$errors->any())
        <script>
            var myModal = document.getElementById('becomeAnInstructor');
            var modal = bootstrap.Modal.getOrCreateInstance(myModal)
            modal.show()
        </script>
    @endif
@endpush
