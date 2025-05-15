<!-- Business Plan Section Start -->
<section id="business-plan">
    <div class="container">

        <div class="row">
            <!-- Start Col -->
            <div class="col-lg-6 col-md-12 lg:pl-0 pt-70 lg:pr-5 animate animate-left-medium">
                <div class="business-item-iframe">
                    <iframe src="{{ __($allSections['business-plan']['link']) }}" class="img-fluid" style="--i:1;">
                    </iframe>
                </div>
            </div>
            <!-- End Col -->
            <!-- Start Col -->
            <div class="col-lg-6 col-md-12 pl-4">
                <div class="business-item-info">
                    <h3 class="animate animate-right-medium" style="--i:2;">{{ __($allSections['business-plan']['title']) }}</h3>
                    <ol style="list-style: decimal">
                            <li class="animate animate-up-medium">{{ __($businessPlanCards[0]['title']) }}</li>
                            <li class="animate animate-up-medium">{{ __($businessPlanCards[0]['text']) }}</li>
                            <li class="animate animate-up-medium">{{ __($businessPlanCards[1]['title']) }}</li>
                    </ol>
                    <p class="mb-2 text-xl">- {{ $allSections['business-plan']['text'] }}</p>
                    <a class="btn btn-common  animate animate-down" style="--i:4;" href="/product-form#contact">@lang('Start Now')</a>
                </div>
            </div>
            <!-- End Col -->


        </div>
    </div>
</section>
<!-- Business Plan Section End -->
