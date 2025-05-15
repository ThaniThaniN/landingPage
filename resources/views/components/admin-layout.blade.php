<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('img/l-favicon.png') }}" type="image/png">    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/fonts/line-icons.css') }}">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/morris/morris.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/main.css') }}">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>

</head>

<body>
<div class="app header-default side-nav-dark">
    <div class="layout">
        <!-- Header START -->
        <div class="header navbar">
            <div class="header-container">
                <div class="nav-logo">
                    <a href="/" class="ml-3">
                        <img class="mt-2" src="{{ asset('img/logo1.png') }}" alt="">
                    </a>
                </div>
                <ul class="nav-left">
                    <li>
                        <a class="sidenav-fold-toggler" href="javascript:void(0);">
                            <i class="lni-menu"></i>
                        </a>
                        <a class="sidenav-expand-toggler" href="javascript:void(0);">
                            <i class="lni-menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav-right">
                    @auth
                        <form method="post" action="{{ route('logout') }}" class="hidden" id="logout-form">
                            @csrf
                            <x-form-button class="mt-2">@lang('Log Out')</x-form-button>
                        </form>
                    @endauth
                </ul>
            </div>
        </div>
        <!-- Header END -->


        <!-- Side Nav START -->

        @php
            $privileges = json_decode(auth()->user()->privilege, true) ?? [];
        @endphp
        <div class="side-nav expand-lg">
            <div class="side-nav-inner">
                <ul class="side-nav-menu">
                    <li class="side-nav-header">
                        <span>ThaniThanin</span>
                    </li>
                    @if(in_array('dashboard', $privileges))
                        <li class="nav-item dropdown {{ request()->routeIs('admin.dashboard') ? 'open' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle">
                      <span class="icon-holder">
                        <i class="lni-dashboard"></i>
                      </span>
                                <span class="title">@lang('Dashboard')</span>
                            </a>
                        </li>
                    @endif
                    @if(in_array('edit-ui', $privileges))
                        <li class="nav-item dropdown {{ request()->routeIs('admin.edit-section-index') ? 'open' : '' }}">
                        <a class="dropdown-toggle" href="#">
                  <span class="icon-holder">
                    <i class="lni-layers"></i>
                  </span>
                            <span class="title">@lang('UI Elements')</span>
                            <span class="arrow">
                    <i class="lni-chevron-right"></i>
                  </span>
                        </a>
                        <ul class="dropdown-menu sub-down">
                            @foreach ($sections ?? [] as $section)
                                @if($section['name'] !== 'getInTouchForm')
                                    <li>
                                        <a href={{ route('admin.edit-section-index', ['sectionId' => $section->id]) }}>{{ __($section->name) }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @if(in_array('suggestion-requests', $privileges) || in_array('product-requests', $privileges))
                    <li class="nav-item dropdown {{ request()->routeIs('admin.product-requests', 'admin.suggestion-requests', 'admin.product-requests.edit', 'admin.suggestion-requests.edit') ? 'open' : '' }}">
                        <a class="dropdown-toggle" href="#">
                  <span class="icon-holder">
                    <i class="lni-timer"></i>
                  </span>
                            <span class="title">@lang('Form Requests')</span>
                            <span class="arrow">
                    <i class="lni-chevron-right"></i>
                  </span>
                        </a>
                        <ul class="dropdown-menu sub-down">
                            @if(in_array('product-requests', $privileges))
                            <li>
                                <a href="{{ route('admin.product-requests') }}">@lang('Product Requests')</a>
                            </li>
                            @endif
                            @if(in_array('suggestion-requests', $privileges))
                            <li>
                                <a href={{ route('admin.suggestion-requests') }}>@lang('Customer Messages')</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if(in_array('moderators', $privileges))
                    <li class="nav-item dropdown {{ request()->routeIs( 'admin.moderators.create', 'admin.moderators.index', 'admin.moderators.edit') ? 'open' : '' }}
">
                        <span class="badge badge-primary badge-pro float-right">Tag</span>
                        <a class="dropdown-toggle" href="#">
                  <span class="icon-holder">
                    <span class="lni-user"></span>
                  </span>
                            <span class="title">@lang('Moderators')</span>
                            <span class="arrow">
                    <i class="lni-chevron-right"></i>
                  </span>
                        </a>
                        <ul class="dropdown-menu sub-down[">
                            <li>
                                <a href="{{ route('admin.moderators.create') }}">@lang("Add moderator")</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.moderators.index') }}">@lang("Edit moderator")</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if(in_array('translations', $privileges))
                    <li class="nav-item dropdown {{ request()->routeIs('admin.translations.index') ? 'open' : '' }}">
                        <a class="dropdown-toggle" href="{{ route('admin.translations.index') }}">
                  <span class="icon-holder">
                    <span class="lni-world"></span>
                  </span>
                            <span class="title">@lang('Translations')</span>
                            <span class="arrow"></span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- Side Nav END -->

        <!-- Page Container START -->
        <div class="page-container">
            <div class="main-content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <!-- Page Container END -->
    </div>
</div>

<!-- Preloader -->
<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>
<!-- End Preloader -->
<!-- jQuery first, then Bootstrap JS -->
<script src="{{ asset('admin/assets/js/jquery-min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.app.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>

<!--Morris Chart-->
<script src="{{ asset('admin/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/raphael/raphael-min.js') }}"></script>

</body>
</html>
