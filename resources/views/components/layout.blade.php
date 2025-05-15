<!DOCTYPE html>
@if(session('locale') === 'en')
    <html lang="en" xmlns:link="http://www.w3.org/1999/html" dir="ltr">
@else
    <html lang="ar" xmlns:link="http://www.w3.org/1999/html" dir="rtl">
@endif
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>@lang('Thani Thanin')</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="img/l-favicon.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/LineIcons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/main.css">
    @if(session('locale') === 'ar')
        <link rel="stylesheet" href="css/main_ar.css">
    @endif
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>

</head>
<style>
    @keyframes slideLeft {
        0%{
            right: -200px;
            top: 10px;
            opacity: 1;
        }
        8%{
            right:20px;
            top: 10px;
        }
        80%{
            right:20px;
            top: 10px;
            opacity: 1;
            display: block;
        }
        100%{
            top: 10px;
            right: -400px;
            opacity: 0 ;
            display: none;
        }
    }
</style>
<body>

<!-- Header Section Start -->
<header id="home" class="hero-area">
    <div class="overlay">
    </div>
    <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
            <a href="/" class="navbar-brand"><img src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lni-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/">@lang('Home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/#features">@lang('Essential instructions')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/#faq">@lang('FAQ')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll"
                           href="locale/{{ session('locale') === 'ar' ? 'en' : 'ar' }}">
                            @lang('English')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-singin" href="/product-form#contact">@lang('try our system now')</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row space-100">
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="contents">
                        <h2 class="head-title">@lang('Thani Thanin')</h2>
                    <p>@lang('Streamline Your Operations, Maximize Your Growth. Your trusted partner for comprehensive business solutions')</p>
                    <div class="header-button">
                        <a href="/product-form#contact" rel="nofollow" class="btn btn-border-filled">@lang('try our system now')</a>
                        <!--                        <a href="#" rel="nofollow" class="btn btn-border page-scroll">Learn More</a>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12 p-0">
                <div class="intro-img">
                    <img src="img/nan-BACK.png" alt="">
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->

@if(session('updateAvailable'))
    <div class="alert alert-info">
        A new update is available! <a href="#" onclick="location.reload();">Click here</a> to refresh.
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success" style="position: absolute; z-index: 999;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: opacity 0.3s ease;
    opacity: 0;
    animation: slideLeft 8s ease 1s forwards;
    ">
        @lang(session('success'))
    </div>
@endif


{{ $slot }}


<!-- Go To Top Link -->
<div class="back-to-top-with-whatsapp">

    <a href="https://wa.me/+966555148981" class="whatsapp-link" target="_blank">
        <i class="fa-brands fa-whatsapp" style="color: #21b859;"></i>
    </a>
    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
    </a>
</div>

<!-- Preloader -->
<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>
<!-- End Preloader -->

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="js/jquery-min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/scrolling-nav.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/nivo-lightbox.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/main.js"></script>
<script src="js/animate.js"></script>


</body>
</html>
