@extends('frontend.layouts.app')

@section('content')

<div class="bg-page">

<!-- Page Header Start -->
<header class="page-banner-header blank-page-banner-header gradient-bg position-relative">
    <div class="section-overlay">
        <div class="blank-page-banner-wrap bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="page-banner-content text-center">
                            <h3 class="page-banner-heading color-heading pb-15" style="color: #fff;">Affiliate Dashboard</h3>

                            <!-- Breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item font-14" style="color: #fff;"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                    <li class="breadcrumb-item font-14 active" style="color: #fff;" aria-current="page">Affiliate</li>
                                </ol>
                            </nav>
                            <!-- Breadcrumb End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Page Header End -->

<!-- Wishlist Page Area Start -->
<section class="wishlist-page-area bg-black">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="affiliator-dashboard-wrap bg-white" style="border-radius: 1.5rem;">
                    <div class="affiliator-dashboard-title d-flex align-items-center justify-content-between border-bottom mb-30 pb-20">
                        <h5>{{ __('Affiliate Form') }}</h5>
                    </div>

                    <form enctype="multipart/form-data" action="{{route('affiliate.create-affiliate-request')}}"  method="post">
                        @csrf
                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{ __('Name') }}</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" readonly class="form-control" id="name" placeholder="{{ __('Write your first name') }}" required="">
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-md-12">
                                <label class="label-text-title color-heading font-medium font-16 mb-2">{{ __('Email address') }}</label>
                                <input type="email" name="email" value="{{Auth::user()->email}}" readonly class="form-control" id="email_address" placeholder="{{ __('Write your email') }}" required="">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="theme-btn theme-button1 default-hover-btn" style="border: 2px #000000 solid;">{{ __('Apply Now') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Wishlist Page Area End -->

</div>

@endsection
