@extends('frontend.layouts.app')
@section('meta')
@php
$metaData = getMeta('home');
@endphp

<meta name="description" content="{{ __($metaData['meta_description']) }}">
<meta name="keywords" content="{{ __($metaData['meta_keyword']) }}">

<!-- Open Graph meta tags for social sharing -->
<meta property="og:type" content="Learning">
<meta property="og:title" content="{{ __($metaData['meta_title']) }}">
<meta property="og:description" content="{{ __($metaData['meta_description']) }}">
<meta property="og:image" content="{{ __($metaData['og_image']) }}">
<meta property="og:url" content="{{ url()->current() }}">

<meta property="og:site_name" content="{{ __(get_option('app_name')) }}">

<!-- Twitter Card meta tags for Twitter sharing -->
<meta name="twitter:card" content="Learning">
<meta name="twitter:title" content="{{ __($metaData['meta_title']) }}">
<meta name="twitter:description" content="{{ __($metaData['meta_description']) }}">
<meta name="twitter:image" content="{{ __($metaData['og_image']) }}">
@if (isAddonInstalled('LMSZAIPRODUCT'))
<link rel="stylesheet" href="{{ asset('addon/product/css/ecommerce-product.css') }}">
@endif
@endsection

@push('theme-style')
<!-- page css -->
<link rel="stylesheet" href="{{ asset('frontend-theme-4/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-theme-4/assets/css/plugins.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-theme-4/assets/scss/style.css') }}">
@endpush

<style>
.hero-banner-content .text-content .sub-title-wrap p {
  font-size: 13px !important;
}

.hero-banner {
  padding: 200px 0 0px !important;
}

@media screen and (max-width: 991px) {
  .hero-banner {
    background-image: none !important;
  }
}

/* General styles for the container */
.sub-title-wrap {
  position: relative;
  overflow: hidden;
}

/* Fade and loop animation */
@keyframes fadeLoop {

  0%,
  100% {
    opacity: 0;
    /* Start and end with invisible text */
  }

  25%,
  75% {
    opacity: 1;
    /* Fade in and out */
  }
}

/* Apply animation to each <p> tag */
.fade-loop {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  opacity: 0;
  /* Start invisible */
  animation: fadeLoop 6s infinite;
  /* 6s duration, loop forever */
}

/* Delay animations for each <p> tag */
.fade-loop:nth-child(1) {
  animation-delay: 0s;
}

.fade-loop:nth-child(2) {
  animation-delay: 2s;
  /* Delay for the second item */
}

.fade-loop:nth-child(3) {
  animation-delay: 4s;
  /* Delay for the third item */
}

/* Add more delays if you have more items */
</style>

@section('content')
<!-- Hero Banner -->
@php
$bannerImage = @$home->banner_image;
if (env('IS_LOCAL', 0)) {
$bannerImage = get_option('banner_image_' . get_option('theme', THEME_DEFAULT));
}
@endphp
<style>
/* Hero Background Effects */
.hero-banner {
  position: relative;
  overflow: hidden;
}

.hero-shapes {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: 1;
}

.hero-shapes div {
  position: absolute;
  border-radius: 50%;
  background: linear-gradient(45deg, rgba(27, 27, 27, 0.1), rgba(73, 75, 235, 0.05));
  animation: float 20s infinite;
}

.shape1 { width: 300px; height: 300px; left: -100px; top: 100px; }
.shape2 { width: 200px; height: 200px; right: 50px; top: 50%; }
.shape3 { width: 100px; height: 100px; left: 30%; bottom: 50px; }

@keyframes float {
  0%, 100% { transform: translate(0, 0) rotate(0deg); }
  25% { transform: translate(50px, 50px) rotate(90deg); }
  50% { transform: translate(0, 100px) rotate(180deg); }
  75% { transform: translate(-50px, 50px) rotate(270deg); }
}

.hero-banner-content {
  position: relative;
  z-index: 3;
}

.text-content {
  color: #ffffff;
  text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
</style>

<section class="hero-banner" data-back ground="{{ getImageFile($bannerImage) }}" 
  style="background-size: contain; background-position: center bottom;">
  <!-- Add animated shapes -->
  <div class="hero-shapes">
    <div class="shape1"></div>
    <div class="shape2"></div>
    <div class="shape3"></div>
  </div>
  
  <div class="container">
    <div class="hero-banner-content">
      <!-- Existing content -->
      <div class="text-content">
        <div class="sub-title-wrap" data-aos="fade-up" data-aos-duration="1000">
          @foreach(@$home->banner_mini_words_title ?? [] as $banner_mini_word)
          <p class="fade-loop">{{ __($banner_mini_word) }}</p>
          @endforeach
        </div>
        <div class="titleText-wrap" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="900">
          <h4 class="title typing-animation">
            <span>{{ __(@$home->banner_first_line_title) }}</span>
            {{ __(@$home->banner_second_line_title) }}
            <span>{{ __(@$home->banner_third_line_title) }}</span>
            {{ __(@$home->banner_fourth_line_title) }}
          </h4>
          <p class="text">{{ __(@$home->banner_subtitle) }}</p>
        </div>
        <div class="d-flex justify-content-center align-items-center g-12 pt-7" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">
          <a href="{{ $home->banner_first_button_link }}" class="hero-btn-1">{{ __($home->banner_first_button_name) }}
            <i class="fa fa-arrow-right"></i></a>
          <a href="{{ $home->banner_second_button_link }}" class="hero-btn-2">{{ __($home->banner_second_button_name) }}
            <i class="fa fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Core Features -->
<section class="core-features core-features-lan {{ @$home->special_feature_area == 1 ? '' : 'd-none' }}"
  style="background: #000000;">
  <div class="container">
    <div class="core-features-content" style="gap: 0 !important">
      <!--  -->
      <div class="title-wrap" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
        <div class="row rg-20 justify-content-lg-between justify-content-center">
          <div class="col-lg-5">
            <h4 class="title">{{ __(get_option('home_special_feature_title')) }}</h4>
          </div>
          <div class="col-lg-4">
            <div class="d-flex flex-column justify-content-end h-100">
              <p class="text">{{ __(get_option('home_special_feature_area_subtitle')) }}</p>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="row rg-20">
        <div class="col-lg-4 col-sm-6" data-aos="fade-right" data-aos-duration="500" data-aos-delay="100">
          <div class="core-features-item core-features-item-lan" style="background: #333333;">
            <!-- First card content -->
            <div class="icon">
              <img src="{{ getImageFile(get_option('home_special_feature_first_logo')) }}" alt="" />
            </div>
            <div class="content">
              <h4 class="title">{{ __(get_option('home_special_feature_first_title')) }}</h4>
              <p class="text">{{ __(get_option('home_special_feature_first_subtitle')) }}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="700" data-aos-delay="100">
          <div class="core-features-item core-features-item-lan" style="background: #333333;">
            <!-- Second card content -->
            <div class="icon">
              <img src="{{ getImageFile(get_option('home_special_feature_second_logo')) }}" alt="" />
            </div>
            <div class="content">
              <h4 class="title">{{ __(get_option('home_special_feature_second_title')) }}</h4>
              <p class="text">{{ __(get_option('home_special_feature_second_subtitle')) }}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">
          <div class="core-features-item core-features-item-lan" style="background: #333333;">
            <!-- Third card content -->
            <div class="icon">
              <img src="{{ getImageFile(get_option('home_special_feature_third_logo')) }}" alt="" />
            </div>
            <div class="content">
              <h4 class="title">{{ __(get_option('home_special_feature_third_title')) }}</h4>
              <p class="text">{{ __(get_option('home_special_feature_third_subtitle')) }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@if(!get_option('private_mode') || !auth()->guest())
@if($home->courses_area == 1)
<!-- Board Section -->
<section class="board-section board-section-lan bg-lan-bg">
  <div class="container">
    <div class="board-section-content">
      <!--  -->
      <div class="title-wrap" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
        <div class="row justify-content-between align-items-center rg-20">
          <div class="col-lg-8">
            <div class="d-flex align-items-lg-center align-items-start g-26">
              <div class="icon d-flex max-w-60 flex-shrink-0">
                <img src="{{ getImageFile(get_option('course_logo')) }}" alt="" />
              </div>
              <div class="content">
                <h4 class="title">{{ __(get_option('course_title')) }}</h4>
                <p class="text">{{ __(get_option('course_subtitle')) }}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="d-flex justify-content-lg-end">
              <a href="{{ route('courses') }}" class="btn-outline-lan">{{__('View All Courses')}} <i
                  class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="row rg-40">
        @if(count($featuredCourses))
        @foreach ($featuredCourses as $key => $course)
        @php
        $userRelation = getUserRoleRelation($course->user);
        @endphp
        <div class="col-xl-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 200 + ($key * 100) }}">
          @include('frontend-theme-4.partials.course')
        </div>
        @endforeach
        @else
        {{ __("No Course Found") }}
        @endif
      </div>
    </div>
  </div>
</section>
@endif
@endif


@if($home->bundle_area == 1)
@if(count($bundles) > 0)
<!-- Latest Bundle Section -->
<section class="latest-bundle latest-bundle-lan bg-lan-bg">
  <div class="container">
    <div class="latest-bundle-content">
      <!--  -->
      <div class="title-wrap" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
        <div class="row justify-content-between align-items-center rg-20">
          <div class="col-lg-8">
            <div class="d-flex align-items-lg-center align-items-start g-26">
              <div class="icon d-flex max-w-60 flex-shrink-0">
                <img src="{{ getImageFile(get_option('bundle_course_logo')) }}" alt="" />
              </div>
              <div class="content">
                <h4 class="title">{{ __(get_option('bundle_course_title')) }}</h4>
                <p class="text">{{ __(get_option('bundle_course_subtitle')) }}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="d-flex justify-content-lg-end">
              <a href="{{ route('bundles') }}" class="btn-outline-lan">{{ __('View All Bundles') }} <i
                  class="fa fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="row rg-30">
        @foreach($bundles->take(4) as $key => $bundle)
        @php
        $relation = getUserRoleRelation($bundle->user)
        @endphp
        <div class="col-md-6" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 200 + ($key * 100) }}">
          <div class="course-item-three">
            <div class="img">
              <img src="{{ getImageFile($bundle->image) }}" alt="" />
            </div>
            <div class="content">
              <a class="title"
                href="{{ route('bundle-details', [$bundle->slug]) }}">{{ Str::limit($bundle->name, 40) }}</a>
              <a class="author"
                href="{{ route('userProfile',$bundle->user->id) }}">{{ @$bundle->user->$relation->name }}</a>
              <p>
                {{__('Courses')}}: <span class="color-hover">{{ @$bundle->bundleCourses->count() }}</span>
              </p>
              <p class="price">{{ __('Price') }}:
                <span>
                  @if($currencyPlacement == 'after')
                  {{$bundle->price}} {{ $currencySymbol }}
                  @else
                  {{ $currencySymbol }} {{$bundle->price}}
                  @endif
                </span>
              </p>
              @if(get_option('cashback_system_mode', 0))
              <div class="cashback">
                <div class="title">{{__('Cashback')}} :</div>
                <div class="amount">
                  @if($currencyPlacement ?? get_currency_placement() == 'after')
                  {{calculateCashback($bundle->price) }} {{ $currencySymbol ?? get_currency_symbol() }}
                  @else
                  {{ $currencySymbol ?? get_currency_symbol() }} {{calculateCashback($bundle->price) }}
                  @endif
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif
@endif


@if($home->customer_says_area == 1)
<!-- Testimonials Section -->
<section class="testimonial-section testimonial-section-lan overflow-hidden" style="background: #000000;">
  <div class="container">
    <div class="testimonial-section-content">
      <!--  -->
      <div class="title-wrap" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
        <div class="icon d-flex">
          <img src="{{ getImageFile(get_option('customer_say_logo')) }}" alt="" />
        </div>
        <h4 class="title">{{ __(get_option('customer_say_title')) }}</h4>
      </div>
      <!--  -->
      <div class="">
        @php
        $customerSayItems = ['first', 'second', 'third', 'fourth'];
        @endphp
        <div class="lan-testimonial-slider owl-carousel">
          @foreach($customerSayItems as $key => $customerSayItem)
          <div class="testimonial-item-one" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 200 + ($key * 100) }}" style="background: #333333;">
            <div class="author">
              <div class="img">
                <img src="{{ getImageFile(get_option('customer_say_'.$customerSayItem.'_image')) }}" alt="quote" />
              </div>
            </div>

            <div class="content">
              <div style="display: flex; flex-direction: row; gap: 20px;">
                <div class="icon" style="flex: 1;">
                  <img src="{{asset('frontend-theme-4/assets/images/quote-icon.svg')}}" alt="quote icon" />
                </div>
                <div class="info" style="flex: 1; color: #fff">
                  <h4 class="name" style="text-align: right;">
                    {{ __(get_option('customer_say_'.$customerSayItem.'_name')) }}</h4>
                  <p class="degi" style="text-align: right;">
                    {{ __(get_option('customer_say_'.$customerSayItem.'_position')) }}</p>
                </div>
              </div>
              <div class="text-content">
                <h4 class="title">{{ __(get_option('customer_say_'.$customerSayItem.'_comment_title')) }}</h4>
                <p class="text">{{ __(get_option('customer_say_'.$customerSayItem.'_comment_description')) }}</p>
              </div>

              <div class="search-instructor-rating w-100 d-inline-flex align-items-center">
                <div class="star-ratings">
                  <div class="fill-ratings"
                    style="width: {{ (float) get_option('customer_say_'.$customerSayItem.'_comment_rating_star') * 20 }}%">
                    <span>★★★★★</span>
                  </div>
                  <div class="empty-ratings">
                    <span>★★★★★</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endif

@if($home->instructor_support_area == 1)
<!-- Support -->
<section class="bg-lan-bg support-section support-section-lan">
  <div class="container">
    <div class="support-section-content">
      <!--  -->
      <div class="title-wrap" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
        <h4 class="title">{{ __(@$aboutUsGeneral->instructor_support_title) }}</h4>
        <p class="text">{{ __(@$aboutUsGeneral->instructor_support_subtitle) }}</p>
      </div>
      <!--  -->
      <div class="row rg-20">
        @foreach($instructorSupports as $index => $instructorSupport)
        <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ 200 + ($index * 100) }}">
          <div class="support-item-one">
            <div class="icon">
              <img src="{{ getImageFile($instructorSupport->image_path) }}" alt="" />
            </div>
            <div class="text-content">
              <h4 class="title">{{ __($instructorSupport->title) }}</h4>
              <p class="text">{{ __($instructorSupport->subtitle) }}</p>
            </div>
            <a href="{{ $instructorSupport->button_link ?? '#' }}"
              class="{{($index%2 == 1) ? 'btn-fill-alt-lan' : 'btn-fill-lan'}}">{{ __($instructorSupport->button_name) }}
              <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif

@if($home->faq_area == 1)
<!-- FAQ -->
<section class="bg-lan-bg faq-section faq-section-lan">
  <div class="container">
    <div class="faq-section-content">
      <!--  -->
      <div class="title-wrap" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
        <h4 class="title">{{ __(get_option('faq_title')) }}</h4>
        <p class="text">{{ __(get_option('faq_subtitle')) }}</p>
      </div>
      <!--  -->
      <div class="accordion zAccordion-reset zAccordion-one" id="accordionExample">
        <div class="row rg-20 justify-content-center">
          @php
          $splitFaqs = $faqQuestions->split(2);
          @endphp
          <div class="col-xl-5 col-lg-6">
            @foreach($splitFaqs->get(0) ?? [] as $key => $faqQuestion)
            <div class="accordion-item" data-aos="fade-right" data-aos-duration="700" data-aos-delay="{{ 200 + ($key * 100) }}">
              <h2 class="accordion-header">
                <button class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapse_{{ $key }}"
                  aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapse_{{ $key }}">{{($key+1)}}
                  . {{ __($faqQuestion->question) }}
                </button>
              </h2>
              <div id="collapse_{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p> {{ __($faqQuestion->answer) }} </p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="col-xl-5 col-lg-6">
            @php
            $labelIndex = count($splitFaqs->get(0) ?? []);
            @endphp
            @foreach($splitFaqs->get(1) ?? [] as $key => $faqQuestion)
            <div class="accordion-item" data-aos="fade-left" data-aos-duration="700" data-aos-delay="{{ 200 + ($key * 100) }}">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse_right_{{$key}}" aria-expanded="false"
                  aria-controls="collapse_right_{{$key}}">{{++$labelIndex}}
                  . {{ __($faqQuestion->question) }}
                </button>
              </h2>
              <div id="collapse_right_{{$key}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p> {{ __($faqQuestion->answer) }} </p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!-- New Video Player Modal Start-->
<div class="modal fade VideoTypeModal" id="newVideoPlayerModal" tabindex="-1" aria-labelledby="newVideoPlayerModal"
  aria-hidden="true">

  <div class="modal-header border-bottom-0">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="iconify"
        data-icon="akar-icons:cross"></span>
    </button>
  </div>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="video-player-area">
          <!-- HTML 5 Video -->
          <video id="player" playsinline controls
            data-poster="{{ getImageFile(get_option('become_instructor_video_preview_image')) }}"
            controlsList="nodownload">
            <source src="{{ getVideoFile(get_option('become_instructor_video')) }}" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('style')
<!-- Video Player css -->
<link rel="stylesheet" href="{{ asset('frontend/assets/vendor/video-player/plyr.css') }}">
@endpush

@push('script')
<!--Hero text effect-->
<script src="{{ asset('frontend/assets/js/course/addToCart.js') }}"></script>
<script src="{{ asset('frontend/assets/js/course/addToWishlist.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/booking.js') }}"></script>

<!-- Video Player js -->
<script src="{{ asset('frontend/assets/vendor/video-player/plyr.js') }}"></script>

<!--  -->
<!-- <script src="{{ asset('frontend-theme-4/assets/js/jquery-3.7.0.min.js') }}"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="{{ asset('frontend-theme-4/assets/js/plugins.js') }}"></script>
<!-- <script src="{{ asset('frontend-theme-4/assets/js/main.js') }}"></script> -->

<script>
const zai_player = new Plyr('#player');
</script>




<!-- Video Player js -->
@endpush