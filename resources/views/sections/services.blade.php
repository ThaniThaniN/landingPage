
<!-- Services Section Start -->
<section id="services" class="section">
    <div class="container">
        <!-- Start Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="features-text section-header text-center">
                    <div>
                        <h2 class="section-title animate animate-up-medium">{{ __($allSections['services']['title']) }}</h2>
                        <div class="desc-text animate animate-up-medium">
                            <p>{{ __($allSections['services']['text']) }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Row -->
        <div class="row">
            @foreach($servicesCards as $servicesCard)
                <!-- Start Col -->
                <div class="col-lg-4 col-md-6 col-xs-12 animate animate-left-medium">
                    <div class="services-item text-center">
                        <div class="icon">
                            {!! $servicesCard['icon'] !!}
                        </div>
                        <h4>{{ __($servicesCard['title']) }}</h4>
                        <p>{{ __($servicesCard['text']) }}</p>
                    </div>
                </div>
                <!-- End Col -->
            @endforeach
        </div>
    </div>
</section>
<!-- Services Section End -->
