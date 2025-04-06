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
                                    <h3 class="page-banner-heading color-heading pb-15" style="color: #fff">{{ __('My Wallet') }}</h3>

                                    <!-- Breadcrumb Start-->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                            <li class="breadcrumb-item font-14 active" aria-current="page">{{ __('Wallet') }}</li>
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

                            <div class="row affiliator-dashboard-title align-items-center border-bottom mb-30 pb-20 mx-0">
                                <div class="col-md-12 col-lg-5 col-xl-5 px-0">
                                    <h5>Wallet Balance</h5>
                                    <h4 class="affiliate-dashboard-item-title">
                                        @if(get_currency_placement() == 'after')
                                            {{userBalance()}} {{ get_currency_symbol() }}
                                        @else
                                            {{ get_currency_symbol() }} {{userBalance()}}
                                        @endif
                                    </h4>
                                </div>
                                <div class="col-md-12 col-lg-7 col-xl-7 px-0">
                                    <div class="affiliate-top-title-btns text-end">
                                        <!-- Withdrawal modal trigger Button -->
                                        @if (get_option('wallet_recharge_system', 0))
                                        <button type="button" class="theme-btn theme-button default-hover-btn"
                                                data-bs-toggle="modal" data-bs-target="#rechargeModal" style="background-color: #090BB4 !important; color:#fff !important;">
                                            {{ __('Deposit') }}
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row booking-history-tabs">
                                <div class="col-12">
                                    <ul class="nav nav-tabs assignment-nav-tabs live-class-list-nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="earning-history-tab" data-bs-toggle="tab" data-bs-target="#earning-history" type="button" role="tab"
                                                    aria-controls="earning-history" aria-selected="true">{{ __('Transaction history') }}
                                            </button>
                                        </li>
                                        
                                        @if (get_option('wallet_recharge_system', 0))
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="wallet-recharge-history-tab" data-bs-toggle="tab" data-bs-target="#wallet-recharge-history" type="button" role="tab" aria-controls="wallet-recharge-history"
                                                aria-selected="false">{{ __('Deposit history') }}
                                                </button>
                                            </li>
                                        @endif
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="earning-history" role="tabpanel" aria-labelledby="earning-history-tab">
                                            <div class="">
                                                <table id="my-earnings" class="table booking-history-past-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="all">{{__('Date')}}</th>
                                                        <th class="none">{{__('Hash')}}</th>
                                                        <th class="none">{{__('Description')}}</th>
                                                        <th class="all">{{__('Type')}}</th>
                                                        <th class="all">{{__('Amount')}}</th>
                                                    </tr>
                                                    </thead>

                                                </table>
                                            </div>

                                        </div>
                                        
                                        <div class="tab-pane fade" id="wallet-recharge-history" role="tabpanel" aria-labelledby="wallet-recharge-history-tab">
                                            <div class="">
                                                <table id="walletRechargeHistory" class="table booking-history-past-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="all">{{__('Date')}}</th>
                                                        <th class="all">{{__('Transaction Id')}}</th>
                                                        <th class="all">{{__('Payment Method')}}</th>
                                                        <th class="all">{{__('Amount')}}</th>
                                                        <th class="all">{{__('Status')}}</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <!--Withdrawal Modal Start-->
            <div class="modal fade" id="rechargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="withdrawal-modal-title text-center">
                                <p class="font-13 font-medium">{{ __('Available Balance') }}</p>
                                <h4>
                                    @if(get_currency_placement() == 'after')
                                        {{userBalance()}} {{ get_currency_symbol() }}
                                    @else
                                        {{ get_currency_symbol() }} {{userBalance()}}
                                    @endif
                                </h4>
                            </div>
                            <form method="GET" action="{{ route('wallet.wallet_recharge.checkout') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12 mb-30">
                                        <div class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Amount' ) }}
                                        <span class="text-danger">*</span>
                                        </div>
                                        <input type="number" name="amount" min="1" class="form-control" placeholder="{{ __('Type amount') }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100">{{ __('Deposit') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Withdrawal Modal End-->

        </section>
        <!-- Wishlist Page Area End -->

    </div>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";
            $('#my-earnings').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                responsive: true,
                ajax: "{{route('wallet.transaction-history')}}",
                order: [1, 'desc'],
                autoWidth:false,
                language: {
                    'paginate': {
                        'previous': '<span class="iconify" data-icon="icons8:angle-left"></span>',
                        'next': '<span class="iconify" data-icon="icons8:angle-right"></span>'
                    }
                },
                dom: '<"row"<"col-sm-4"l><"col-sm-4"B><"col-sm-4"f>>tr<"bottom"<"row"<"col-sm-6"i><"col-sm-6"p>>><"clear">',
                buttons: [
                    { extend: 'copy', className: 'theme-btn theme-button1 default-hover-btn' },
                    { extend: 'excel', className: 'theme-btn theme-button1 default-hover-btn' },
                    { extend: 'pdf', className: 'theme-btn theme-button1 default-hover-btn' }
                ],
                columns: [
                    {"data": "date", "title":'Date'},
                    {"data": "hash","title":"Transaction ID"},
                    {"data": "narration","title":"Description"},
                    {"data": "type","title":"Type"},
                    {"data": "amount","title":"Amount"},

                ]
            });
           
            $('#walletRechargeHistory').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                responsive: true,
                language: {
                    'paginate': {
                        'previous': '<span class="iconify" data-icon="icons8:angle-left"></span>',
                        'next': '<span class="iconify" data-icon="icons8:angle-right"></span>'
                    }
                },
                ajax: "{{route('wallet.recharge-history')}}",
                order: [0, 'desc'],
                autoWidth:false,
                dom: '<"row"<"col-sm-4"l><"col-sm-4"B><"col-sm-4"f>>tr<"bottom"<"row"<"col-sm-6"i><"col-sm-6"p>>><"clear">',
                buttons: [
                    { extend: 'copy', className: 'theme-btn theme-button1 default-hover-btn' },
                    { extend: 'excel', className: 'theme-btn theme-button1 default-hover-btn' },
                    { extend: 'pdf', className: 'theme-btn theme-button1 default-hover-btn' }
                ],
                columns: [
                    {"data": "date", "title":'Date'},
                    {"data": "transaction_id","title":"Transaction ID"},
                    {"data": "payment_method","title":"Payment Method"},
                    {"data": "amount","title":"amount"},
                    {"data": "status","title":"Status"},

                ]
            });
        })(jQuery)
    </script>
@endpush
