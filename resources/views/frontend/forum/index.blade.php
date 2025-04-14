@extends('frontend.layouts.app')
@section('meta')
    @php
        $metaData = getMeta('forum');
    @endphp

    <meta name="description" content="{{ $metaData['meta_description'] }}">
    <meta name="keywords" content="{{ $metaData['meta_keyword'] }}">

    <!-- Open Graph meta tags for social sharing -->
    <meta property="og:type" content="Learning">
    <meta property="og:title" content="{{ $metaData['meta_title'] }}">
    <meta property="og:description" content="{{ $metaData['meta_description'] }}">
    <meta property="og:image" content="{{ $metaData['og_image'] }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta property="og:site_name" content="{{ get_option('app_name') }}">

    <!-- Twitter Card meta tags for Twitter sharing -->
    <meta name="twitter:card" content="Learning">
    <meta name="twitter:title" content="{{ $metaData['meta_title'] }}">
    <meta name="twitter:description" content="{{ $metaData['meta_description'] }}">
    <meta name="twitter:image" content="{{ $metaData['og_image'] }}">
@endsection
@section('content')
    <div class="">
        <!-- Consultation Page Header Start -->
        <header class="page-banner-header gradient-bg position-relative">
            <div class="section-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="page-banner-content forum-banner-content text-center">
                                <h3 class="page-banner-heading text-white" style="padding-bottom: 80px;">{{ __('Forum') }}</h3>
                                <div class="forum-banner-search-ask-wrap d-flex align-items-center justify-content-center">
                                    <div class="input-group position-relative">
                                        <input class="form-control border-0 bg-transparent searchForumBar" type="search"
                                            placeholder="{{ __('Type to search for solutions...') }}">
                                        <button class="bg-transparent border-0"><span class="iconify"
                                                data-icon="akar-icons:search"></span></button>

                                        <!-- Search Bar Suggestion Box Start -->
                                        <div class="search-bar-suggestion-box searchBlogBox custom-scrollbar searchForumBox d-none">
                                            <ul class="appendForumSearchList">

                                            </ul>
                                        </div>
                                        <!-- Search Bar Suggestion Box End -->
                                    </div>

                                    <p class="font-24 font-medium text-white px-4">{{ __('or') }}</p>
                                    <a href="{{ route('forum.askQuestion') }}"
                                        class="theme-button1">{{ __('Ask a Question') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Consultation Page Header End -->

        <!-- Special Feature / Forum Categories Area Start -->
        <section class="special-feature-area forum-categories-area section-t-space section-b-85-space bg-white">
            <div class="container">

                <div class="row">
                    @foreach ($forumCategories as $forumCategory)
                        <!-- Single Feature Item start-->
                        <div class="col-6 col-md-3">
                            <div class="single-feature-item d-flex align-items-center">
                                <div class="flex-shrink-0 feature-img-wrap" style="padding-right: 10px;">
                                    <a href="{{ route('forum.forumCategoryPosts', $forumCategory->uuid) }}"><img
                                            src="{{ getImageFile($forumCategory->logo) }}" alt="feature" style="max-width: 50px;"></a>
                                </div>
                                <div class="flex-grow-1 feature-content" style="height: 100px; display: flex; flex-direction: column; justify-content: center;">
                                    <h6>
                                        <a href="{{ route('forum.forumCategoryPosts', $forumCategory->uuid) }}" 
                                        class="text-wrap" 
                                        style="display: inline-block; max-width: 100%; white-space: normal; word-wrap: break-word;">
                                        {{ Str::limit($forumCategory->title, 15) }}
                                        </a>
                                    </h6>
                                    <p class="text-wrap" style="max-width: 100%; white-space: normal; word-wrap: break-word;">
                                        {{ Str::limit($forumCategory->subtitle, 15) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Feature Item End-->
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Special Feature / Forum Categories Area End -->

        <!-- Forum Countdown Area Start -->
        <section class="forum-countdown-area gradient-bg p-0">
            <div class="section-overlay section-t-space section-b-space">
                <div class="container">

                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="single-feature-item d-flex align-items-center bg-transparent">
                                <div class="flex-shrink-0 feature-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/feature-img/forum-countdown1.png') }}"
                                        alt="feature">
                                </div>
                                <div class="flex-grow-1 ms-3 feature-content">
                                    <h6 class="text-white">{{ __('Categories') }}</h6>
                                    <p>{{ count($forumCategories) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="single-feature-item d-flex align-items-center bg-transparent">
                                <div class="flex-shrink-0 feature-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/feature-img/forum-countdown2.png') }}"
                                        alt="feature">
                                </div>
                                <div class="flex-grow-1 ms-3 feature-content">
                                    <h6 class="text-white">{{ __('Post Topic') }}</h6>
                                    <p>{{ $totalForumPost }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="single-feature-item d-flex align-items-center bg-transparent">
                                <div class="flex-shrink-0 feature-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/feature-img/forum-countdown3.png') }}"
                                        alt="feature">
                                </div>
                                <div class="flex-grow-1 ms-3 feature-content">
                                    <h6 class="text-white">{{ __('Answers') }}</h6>
                                    <p>{{ $totalForumAnswer }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="single-feature-item d-flex align-items-center bg-transparent">
                                <div class="flex-shrink-0 feature-img-wrap">
                                    <img src="{{ asset('frontend/assets/img/feature-img/forum-countdown4.png') }}"
                                        alt="feature">
                                </div>
                                <div class="flex-grow-1 ms-3 feature-content">
                                    <h6 class="text-white">{{ __('Members') }}</h6>
                                    <p>{{ $totalMember }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Forum Countdown Area End -->

        <!-- Ask a question area start -->
        <section class="forum-categories-area section-t-space section-b-space">
            <div class="container">
                <div class="row">
                    <!-- Forum Categories Left Start -->
                    <div class="col-12 col-md-12 col-xl-8">
                        <div class="forum-categories-left">
                            <div class="forum-categories-filter-box d-flex align-items-center">
                                <select id="inputState" class="form-select color-heading forumCategory">
                                    <option value="">{{ __('All Categories') }}</option>
                                    @foreach ($forumCategories as $forumCategory)
                                        <option value="{{ $forumCategory->id }}">{{ $forumCategory->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="forum-categories-wrap appendForumCategoryPosts">
                                @include('frontend.forum.partial.render-forum-posts')
                            </div>

                        </div>
                    </div>
                    <!-- Forum Categories Left End -->

                    <!-- Forum Categories Right Start -->
                    <div class="col-12 col-md-12 col-xl-4">
                        <div class="forum-categories-right">
                            <a href="{{ route('forum.askQuestion') }}"
                                class="w-100 theme-btn theme-button1 theme-button3 forum-ask-question-btn">{{ __('Ask a Question') }}</a>

                            <ul class="forum-link-box radius-4 border-1 mt-4">
                                <li class="forum-link-box-title font-20 color-heading font-medium">
                                    <span class="iconify me-2" data-icon="bi:star"></span>{{ __('Top Contributors') }}
                                </li>
                                @foreach ($topContributors as $topContributor)
                                    <li>
                                        <div class="forum-author-item d-flex align-items-center justify-content-between">
                                            <div class="forum-author-item-left">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="#"
                                                            class="forum-author-img-wrap radius-50 overflow-hidden">
                                                            <img src="{{ getImageFile($topContributor->image_path) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <a href="#"
                                                        class="flex-grow-1 mx-2 font-18 font-medium color-heading forum-author-name">
                                                        @if (@$topContributor->role == 1)
                                                            {{ $topContributor->name }}
                                                        @elseif(@$topContributor->role == 2)
                                                            {{ $topContributor->instructor->name }}
                                                        @elseif(@$topContributor->role == 3)
                                                            {{ $topContributor->student->name }}
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="author-item-right d-flex align-items-center">
                                                <span class="iconify"
                                                    data-icon="bi:star"></span><span>{{ $topContributor->totalComments }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <li class="forum-link-box-title font-18 color-heading font-medium">
                                    <a href="{{ route('forum.forumLeaderboard') }}">{{ __('View All') }} <i
                                            data-feather="arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Forum Categories Right End -->
                </div>
            </div>
        </section>
        <!-- Ask a question area end -->

    </div>
    <input type="hidden" class="renderForumCategoryPostsRoute" value="{{ route('forum.renderForumCategoryPosts') }}">
    <input type="hidden" class="searchForumRoute" value="{{ route('forum.search-forum.list') }}">
@endsection

@push('script')
    <script>
        'use strict'

        $(document).on('change', '.forumCategory', function() {
            var forum_category_id = this.value;
            var renderForumCategoryPostsRoute = $('.renderForumCategoryPostsRoute').val();
            $.ajax({
                type: "GET",
                url: renderForumCategoryPostsRoute,
                data: {
                    "forum_category_id": forum_category_id,
                },
                datatype: "json",
                success: function(response) {
                    $('.appendForumCategoryPosts').html(response)
                }
            });
        });

        $(document).keyup('.searchForumBar',function() {
            var title = $('.searchForumBar').val()
            var searchForumRoute = $('.searchForumRoute').val()
            console.log(searchForumRoute, title)

            if (title) {
                $('.searchForumBox').removeClass('d-none')
                $('.searchForumBox').addClass('d-block')
            } else {
                $('.searchForumBox').removeClass('d-block')
                $('.searchForumBox').addClass('d-none')
            }

            $.ajax({
                type: "GET",
                url: searchForumRoute,
                data: {'title': title},
                success: function (response) {
                    $('.appendForumSearchList').html(response);
                }
            });
        });

    </script>
@endpush
