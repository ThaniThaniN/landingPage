<!-- Footer Section Start -->
<footer>
    <!-- Footer Area Start -->
    <section id="footer-Content">
        <div class="container">
            <!-- Start Row -->
            <div class="row" style="display: flex; justify-content: space-between">

                <!-- Start Col -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                    <div class="footer-logo">
                        <img src="img/logo.png" alt="">
                    </div>
                    <p class="mt-3 text-white">{{ __($allSections['footer']['title']) }}</p>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title">@lang('contact our team')</h3>
                        <ul class="menu">
                            <li><a href="#">{{ __($allSections['footer']['title']) }}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
{{--                <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12 hidden">--}}
{{--                    <div class="widget">--}}
{{--                        <h3 class="block-title">@lang('if you`re a customer')</h3>--}}
{{--                        <ul class="menu">--}}
{{--                            <li><x-link-button href="">@lang('Sign in now')</x-link-button></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>

        <!-- Star Row -->

{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="site-info text-center mt-5 sm:mt-10">--}}
{{--                    <p style="font-size: 1.6rem; display: flex; gap: 1rem; justify-content: center;">--}}
{{--                        <a class="text-white" href=""><i class="fa-brands fa-whatsapp"></i></a>--}}
{{--                        <a class="text-white" href=""><i class="fa-brands fa-facebook"></i></a>--}}
{{--                        <a class="text-white" href=""><i class="fa-brands fa-youtube"></i></a>--}}
{{--                        <a class="text-white" href=""><i class="fa-brands fa-instagram"></i></a>--}}
{{--                        <a class="text-white" href=""><i class="fa-brands fa-github"></i></a>--}}
{{--                    </p>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- End Col -->--}}
{{--        </div>--}}

        <!-- End Row -->


        <!-- Copyright Start  -->

        <div class="copyright">
            <div class="container">
                <!-- Star Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-info text-center">
                            <p>&copy; Thani. All Rights Reserved <span id="year"></span></p>
                            <script>
                                document.getElementById("year").textContent = new Date().getFullYear();
                            </script>
                        </div>

                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Copyright End -->
    </section>
    <!-- Footer area End -->

</footer>
<!-- Footer Section End -->
