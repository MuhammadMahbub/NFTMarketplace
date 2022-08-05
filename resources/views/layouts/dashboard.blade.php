<!DOCTYPE html>
<html class="loaded {{ themesettings(Auth::id())->theme }}" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Digital Tech">

    <title>@yield('title')</title>


    <link rel="apple-touch-icon" href="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->favicon ?? '' }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->favicon ?? '' }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/themes/semi-dark-layout.css') }}">

    {{-- Tostar --}}
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard_assets/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard_assets/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/pages/app-invoice-list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/pages/app-user.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/fontawesome.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"/>

    @yield('css')

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none !important;
        }

        .bg__shade{
            background: rgb(238, 235, 235);
        }
        .apexcharts-menu-icon{
            display: none;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-{{ themesettings(Auth::id())->nav }}" data-open="click" data-menu="vertical-menu-modern">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <ul class="nav navbar-nav align-items-center ml-auto">
                @php
                    $locale = \App::getLocale();
                @endphp
                <li class="nav-item dropdown dropdown-language">
                    @if ($locale == "fr")
                        <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-fr"></i><span class="selected-language">French</span></a>
                    @else
                        <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                    @endif
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                        <a class="dropdown-item" href="{{ route('locale', 'en') }}" data-language="en"><i class="flag-icon flag-icon-us"></i> English<a>
                        <a class="dropdown-item" href="{{ route('locale', 'fr') }}" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a id="dark" class="nav-link nav-link-style">
                        <i class="ficon" data-feather="moon"></i>
                    </a>
                </li>
                {{-- #### notification ###### --}}
                @php
                    $notifications = App\Models\Notification::where('notify_to', Auth::id())->latest()->get();
                    $unseen_notifications = App\Models\Notification::where('notify_to', Auth::id())->where('status','unseen')->get();
                @endphp
                <li class="nav-item dropdown dropdown-notification mr-25">

                    <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                        <i class="ficon" data-feather="bell"></i>
                        @if ($unseen_notifications->count() > 0)
                            <span class="badge badge-pill badge-danger badge-up">{{ $unseen_notifications->count() }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                                <div class="badge badge-pill badge-light-primary">{{ $unseen_notifications->count() }} New</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            @foreach ($notifications as $notify)
                            @php
                                $user_info = App\Models\User::find($notify->user_id);
                            @endphp

                            @if ($notify->status == 'unseen')
                            <div class="media d-flex align-items-start bg__shade">
                                <div class="media-left">
                                    <div class="avatar">
                                        <img src="{{ asset('uploads/images/users') }}/{{ $user_info->profile_photo_path ?? 'default.jpg'}}" alt="avatar" width="32" height="32">
                                    </div>
                                </div>
                                <a class="notify_msg_seen" data-id="{{ $notify->id }}">
                                    <div class="media-body">
                                        <p class="media-heading">
                                            <span class="font-weight-bolder">{{ $notify->message }} </span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <hr class="dark:bg-jacarta-600 bg-jacarta-100 h-px border-0" />
                            @else
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar">
                                        <img src="{{ asset('uploads/images/users') }}/{{ $user_info->profile_photo_path ?? 'default.jpg'}}" alt="avatar" width="32" height="32">
                                    </div>
                                </div>
                                <a href="{{ route('notification.view', $notify->id) }}">
                                    <div class="media-body">
                                        <p class="media-heading"><span class="font-weight-lighter">
                                        {{ $notify->message }}</span> </p><small class="notification-text"></small>
                                    </div>
                                </a>
                            </div>
                            <hr class="dark:bg-jacarta-600 bg-jacarta-100 h-px border-0" />
                            @endif

                            @endforeach

                        </li>
                        @if ($unseen_notifications->count() > 0)
                        <li class="dropdown-menu-footer">
                            <a class="btn btn-primary btn-block" href="{{ route('mark_all_notify', Auth::id()) }}">Mark as All Read</a>
                        </li>
                        @endif
                        <li class="dropdown-menu-footer">
                            <a class="btn btn-info btn-block" href="{{ route('view_all_notify', Auth::id()) }}">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                {{-- #### notification ###### --}}

                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">{{ ucfirst(Auth::user()->name) }}</span>
                            <span class="user-status">{{ Auth::user()->role_id == 1 ? 'Admin' : 'User' }}</span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{ asset('uploads/images/users') }}/{{ Auth::user()->profile_photo_path }}" alt="Profile Photo" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{ route('profile_edit', Auth::user()->slug) }}"><i class="mr-50" data-feather="user"></i> Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();"><i class="mr-50" data-feather="power"></i>{{ __('Logout') }}</a>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <span>
                            <img class="navbar-brand__image navbar-brand__image--light img-fluid" src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo ?? '' }}" alt="Logo">
                            <img class="navbar-brand__image navbar-brand__image--dark img-fluid" src="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->logo_dark ?? ''}}" alt="Logo" />
                        </span>
                        {{-- <h2 class="brand-text">NFT</h2> --}}
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a id="toggle" class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="{{ url('/') }}" target="_blank">
                        <i data-feather='eye'></i>
                        <span class="menu-title text-truncate" data-i18n="Dashboards">{{ __('View Website') }}</span>
                    </a>

                </li>
                <li class="nav-item @yield('dashboard')">
                    <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                        <i data-feather='database'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item @yield('users')">
                    <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                        <i data-feather='users'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">{{ __('Users') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='activity'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">{{ __("Current NFT's") }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="nav-item @yield('item')">
                            <a class="d-flex align-items-center" href="{{ route('item.index') }}">
                                <i data-feather='wind'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('Items/Collections') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('nft_category')">
                            <a class="d-flex align-items-center" href="{{ route('nft_category.index') }}">
                                <i data-feather='slack'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{__('NFT Category')}}</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item @yield('showLike')">
                            <a class="d-flex align-items-center" href="{{ route('showLike.index') }}">
                                <i data-feather='edit'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{__('Show Like')}}</span>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __('Homes') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                <li class="nav-item @yield('homeTitle')">
                    <a class="d-flex align-items-center" href="{{ route('homeTitles.index') }}">
                        <i data-feather='home'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Home Page Titles') }}</span>
                    </a>
                </li>
                <li class="nav-item @yield('banner')">
                    <a class="d-flex align-items-center" href="{{ route('banner.index') }}">
                        <i data-feather='credit-card'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Banner Settings') }}</span>
                    </a>
                </li>
                <li class="nav-item @yield('nftModule')">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='activity'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('NFT Sell Modules') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="nav-item @yield('nftModuleIndex')">
                            <a class="d-flex align-items-center" href="{{ route('nftModule.index') }}">
                                <i data-feather='align-center'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('List') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('nftModuleCreate')">
                            <a class="d-flex align-items-center" href="{{ route('nftModule.create') }}">
                                <i data-feather='edit'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('Create') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __('Pages') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                {{-- About Section Start --}}
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='cpu'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">{{ __('About us') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@yield('aboutHeaderIndex')">
                            <a class="d-flex align-items-center" href="{{ route('about.header') }}">
                                <i data-feather='credit-card'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Header Info') }}</span>
                            </a>
                        </li>
                        <li class="@yield('aboutCount')">
                            <a class="d-flex align-items-center" href="{{ route('about.count') }}">
                                <i data-feather='disc'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Count Data') }}</span>
                            </a>
                        </li>
                        <li class="@yield('teamBanner')">
                            <a class="d-flex align-items-center" href="{{ route('team.banner') }}">
                                <i data-feather='git-pull-request'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Team Banner') }}</span>
                            </a>
                        </li>
                        <li class="@yield('team')">
                            <a class="d-flex align-items-center" href="{{ route('team') }}">
                                <i data-feather='smile'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Team') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- About Section End --}}
                {{-- Contact Section Start --}}
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='phone-incoming'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">{{ __('Contact Us') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@yield('contactUs')">
                            <a class="d-flex align-items-center" href="{{ route('contactUs') }}">
                                <i data-feather='disc'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('ContactUs Titles') }}</span>
                            </a>
                        </li>
                        <li class="@yield('contactAddress')">
                            <a class="d-flex align-items-center" href="{{ route('contact.address') }}">
                                <i data-feather='dribbble'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Contact Address') }}</span>
                            </a>
                        </li>
                        <li class="@yield('userMessage')">
                            <a class="d-flex align-items-center" href="{{ route('userMessage') }}">
                                <i data-feather='home'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('User Messages') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Contact Section End --}}
                <li class="nav-item @yield('wallet')">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='hard-drive'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Wallet Setup') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@yield('walletBanner')">
                            <a class="d-flex align-items-center" href="{{ route('wallet.banner') }}">
                                <i data-feather='credit-card'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Banner') }}</span>
                            </a>
                        </li>
                        <li class="@yield('walletServices')">
                            <a class="d-flex align-items-center" href="{{ route('wallet.services') }}">
                                <i data-feather='command'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Wallet Services') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('term_service')">
                    <a class="d-flex align-items-center" href="{{ route('term_service.index') }}">
                        <i data-feather='figma'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Terms and Services') }}</span>
                    </a>
                </li>
                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __('Resources') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='smile'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">{{ __('Partners') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@yield('partnerTitles')">
                            <a class="d-flex align-items-center" href="{{ route('partner.titles') }}">
                                <i data-feather='bar-chart'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Titles') }}</span>
                            </a>
                        </li>
                        <li class="@yield('partnerTopSection')">
                            <a class="d-flex align-items-center" href="{{ route('partner.topSection') }}">
                                <i data-feather='arrow-up'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Top Section') }}</span>
                            </a>
                        </li>

                        <li class="nav-item @yield('partnerSignUp')">
                            <a class="d-flex align-items-center" href="{{ route('partner.signUp.index') }}">
                                <i data-feather='shield'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('SignUp Section') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('partnerBrandImage')">
                            <a class="d-flex align-items-center" href="{{ route('partner.brandImage.index') }}">
                                <i data-feather='feather'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('Brand Images') }}</span>
                            </a>
                        </li>
                        <li class="@yield('platform')">
                            <a class="d-flex align-items-center" href="{{ route('platform.titles') }}">
                                <i data-feather='circle'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Platform Titles') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('partnerReview')">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='cloud-lightning'></i>
                        <span class="menu-item text-truncate" data-i18n="List">{{ __('Reviews') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@yield('partnerReviewIndex')">
                            <a class="d-flex align-items-center" href="{{ route('partner.review.index') }}">
                                <i data-feather='book-open'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('List') }}</span>
                            </a>
                        </li>
                        <li class="@yield('partnerReviewCreate')">
                            <a class="d-flex align-items-center" href="{{ route('partner.review.create') }}">
                                <i data-feather='user-plus'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Create') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('partnerServiceSection')">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='package'></i>
                        <span class="menu-item text-truncate" data-i18n="List">{{ __('Services') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@yield('partnerServiceIndex')">
                            <a class="d-flex align-items-center" href="{{ route('partner.service.index') }}">
                                <i data-feather='book-open'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Service List') }}</span>
                            </a>
                        </li>
                        <li class="@yield('partnerServiceSectionCreate')">
                            <a class="d-flex align-items-center" href="{{ route('partner.service.create') }}">
                                <i data-feather='plus-square'></i>
                                <span class="menu-item text-truncate" data-i18n="List">{{ __('Partner Service Create') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='help-circle'></i>
                        <span class="menu-item text-truncate" data-i18n="List">{{ __('Help Center') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="nav-item @yield('help_center_title')">
                            <a class="d-flex align-items-center" href="{{ route('help_center_title.create') }}">
                                <i data-feather='edit-3'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('Help Center Title') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('help_center')">
                            <a class="d-flex align-items-center" href="{{ route('help_center.index') }}">
                                <i data-feather='rotate-ccw'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('Help Center') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('faq')">
                    <a class="d-flex align-items-center" href="{{ route('faq.index') }}">
                        <i data-feather='shopping-bag'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('FAQ') }}</span>
                    </a>
                </li>
                <li class="nav-item @yield('newsletter')">
                    <a class="d-flex align-items-center" href="{{ route('newsletter.index') }}">
                        <i data-feather='play'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Newsletter') }}</span>
                    </a>
                </li>

                <li class="nav-item @yield('liked_items')">
                    <a class="d-flex align-items-center" href="{{ route('liked_items') }}">
                        <i data-feather='thumbs-up'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Liked Items') }}</span>
                    </a>
                </li>
                <li class="nav-item @yield('bid_items')">
                    <a class="d-flex align-items-center" href="{{ route('bid_items') }}">
                        <i data-feather='dollar-sign'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Bids') }}</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='alert-triangle'></i>
                        <span class="menu-item text-truncate" data-i18n="List">{{ __('Reports') }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="nav-item @yield('itemReport')">
                            <a class="d-flex align-items-center" href="{{ route('ItemReport.index') }}">
                                <i data-feather='alert-triangle'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('All Reports') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('itemProblems')">
                            <a class="d-flex align-items-center" href="{{ route('ItemProblem.index') }}">
                                <i data-feather='trello'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('Reports on Item') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('report_on_category')">
                            <a class="d-flex align-items-center" href="{{ route('report_on_category') }}">
                                <i data-feather='refresh-ccw'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('Reports on Category') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @yield('reportUsers')">
                            <a class="d-flex align-items-center" href="{{ route('user.report.index') }}">
                                <i data-feather='user-minus'></i>
                                <span class="menu-title text-truncate" data-i18n="Email">{{ __('Reports on User') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('subscribers')">
                    <a class="d-flex align-items-center" href="{{ route('all_subscriber') }}">
                        <i data-feather='at-sign'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Subscribers') }}</span>
                    </a>
                </li>
                <li class="nav-item @yield('notifications')">
                    <a class="d-flex align-items-center" href="{{ route('view_all_notify', Auth::id()) }}">
                        <i data-feather='bell'></i>
                        <span class="menu-title text-truncate" data-i18n="Email">{{ __('Notifications') }}</span>
                    </a>
                </li>
                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __('Blogs') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                <li class="@yield('BlogCategoryList')">
                    <a class="d-flex align-items-center" href="{{ route('blog_category.index') }}">
                        <i data-feather='trello'></i>
                        <span class="menu-item text-truncate" data-i18n="List">{{ __('Categories') }}</span>
                    </a>
                </li>
                <li class="@yield('BlogList')">
                    <a class="d-flex align-items-center" href="{{ route('blogs.index') }}">
                        <i data-feather='home'></i>
                        <span class="menu-item text-truncate" data-i18n="Add">{{ __('Blog List') }}</span>
                    </a>
                </li>
                <li class="@yield('BlogCreate')">
                    <a class="d-flex align-items-center" href="{{ route('blogs.create') }}">
                        <i data-feather='plus-square'></i>
                        <span class="menu-item text-truncate" data-i18n="Add">{{ __('Write Blog') }}</span>
                    </a>
                </li>

                {{-- Site Settings --}}
                <li class="navigation-header">
                    <span data-i18n="Apps &amp; Pages">{{ __('Site Settings') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                <li class="nav-item @yield('generalSettings')">
                    <a class="d-flex align-items-center" href="{{ route('generalSettings.index') }}">
                        <i data-feather='settings'></i>
                        <span class="menu-title text-truncate">{{ __('General Settings') }}</span>
                    </a>
                </li>
                <li class="nav-item @yield('socialurls')">
                    <a class="d-flex align-items-center" href="{{ route('socialurls.index') }}">
                        <i data-feather='twitter'></i>
                        <span class="menu-title text-truncate">{{ __('Social Urls') }}</span>
                    </a>
                </li>
                <li class="nav-item @yield('loginPageDesign')">
                    <a class="d-flex align-items-center" href="{{ route('login.page.design') }}">
                        <i data-feather='cpu'></i>
                        <span class="menu-title text-truncate">{{ __('Login Page Design') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
                    <div class="form-group breadcrumb-right">

                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                    {{-- Content Start From Here --}}
                        @yield('content')
                    {{-- Content End Here --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @stack('all_modals')

    <div class="modal fade text-left" id="testModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Basic Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Check First Paragraph</h5>
                    <p>
                        Oat cake ice cream candy chocolate cake chocolate cake cotton candy dragée apple pie. Brownie
                        carrot cake candy canes bonbon fruitcake topping halvah. Cake sweet roll cake cheesecake cookie
                        chocolate cake liquorice.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">{{ __('COPYRIGHT') }} &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a class="ml-25" href="{{ route('home') }}" target="_blank"><b>{{ generalsettings()->app_title }}</b></a>
                <span class="d-none d-sm-inline-block">, {{ __('All rights Reserved') }}</span>
            </span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->
    {{-- tostar --}}
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('dashboard_assets/app-assets/js/core/app-menu.js') }}"></script>

    {{-- font-awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>

    @yield('js')

    <script>
        $(document).ready(function(){
            $('#dark').click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('theme.color') }}",
                    type: "GET",
                    success: function(data)
                    {
                    }
                })
            });
        })
    </script>

    <script>
        $(document).ready(function(){
            $(".notify_msg_seen").on("click", function(){
                let notify_id = $(this).attr('data-id')
            //    alert(notify_id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('notification_seen') }}",
                    type: "POST",
                    data: {
                        notify_id: notify_id,
                    },
                    success: function (response){
                        window.location.href= "{{ url('/notification-view') }}/" + notify_id
                    },
                });
            });
        });
    </script>

    {{-- tostar --}}
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif

    @if (session()->get('warning'))
        <script>
            toastr.warning('{{ session()->get('warning') }}');
        </script>
    @endif

    @if (session()->get('success'))
    <script>
        toastr.success('{{ session()->get('success') }}');
    </script>
    @endif


    <script>
        $(document).ready(function(){
            $('#toggle').click(function(){
                // Ajax Setup
                 $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('theme.toggle') }}",
                        type: "GET",
                        success: function(data)
                        {
                        }
                    })


            });
        })
    </script>


    <script src="{{ asset('dashboard_assets/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard_assets/app-assets/js/scripts/pages/app-user-view.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#data_table').DataTable();
        } );
    </script>

</body>
<!-- END: Body-->

</html>
