<style>
    /*FUTURE PLANS*/
#services .services-item-future {
padding: 60px 30px;
border: 1px solid #ddd;
-moz-transition: all .8s ease;
-webkit-transition: all .8s ease;
transition: all .8s ease; }
#services .services-item-future:hover {
border: 1px solid #1ec0df;
box-shadow: 0px 0px 25px 0px rgba(95, 95, 95, 0.24);
-moz-transition: all .4s ease;
-webkit-transition: all .4s ease;
transition: all .4s ease; }
#services .services-item-future img {
width: 70%;
margin: 0 auto;
text-align: center;
display: block;
position: relative;
margin-bottom: 25px; }
@media (max-width: 600px) {
#services .services-item-future img {
width: 180px;
}
}
/*FUTURE PLANS*/
</style>
<!-- Services Section Start -->
<section id="services" class="section">
    <div class="container">
        <!-- Start Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="features-text">
                    <h2 class="section-title animate animate-up-medium">{{ __($allSections['future-plans']['title']) }}</h2>
                    <div class="desc-text animate animate-up-medium">
                        <h6>{{ __($allSections['future-plans']['text']) }}</h6>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="features-text">
                    <h2 class="section-title animate animate-up-medium">{{ __($futureCards[0]['title']) }}</h2>
                    <div class="desc-text animate animate-up-medium">
                        <h6>{{ __($futureCards[0]['text']) }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row my-2">
            <div class="col-lg-12">
                <div class="features-text">
                    <h2 class="section-title animate animate-up-medium">@lang('Our Future Plans')</h2>
                </div>
            </div>
        </div>
        <!-- End Row -->

        <div class="row">
            @foreach($futureCards as $futureCard)
                @if($futureCard['id'] != 15)
                    <!-- Start Col -->
                    <div class="col-lg-4 col-md-6 col-xs-12 animate animate-left-medium">
                        <div class="services-item-future text-center border-0">
                            <img src="{{ asset('img/' . $futureCard['icon']) }}" alt="">
                            <h4 class="mt-5">{{ __($futureCard['title']) }}</h4>
                        </div>
                    </div>
                @endif
                <!-- End Col -->
            @endforeach
        </div>
    </div>
</section>
<!-- Services Section End -->
