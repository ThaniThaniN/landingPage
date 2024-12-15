<!-- Cool Fetatures Section Start -->
<section id="features" class="section">
    <div class="container">
        <!-- Start Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="features-text section-header text-center">
                    <div>
                        <h2 class="section-title animate animate-up-medium">{{ __($allSections['features']['title']) }}</h2>
                        <div class="desc-text animate animate-up-medium">
                            <p>{{ __($allSections['features']['text']) }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row featured-bg">
            @foreach($featuresCards as $featuresCard)
                    <!-- Start Col -->
                <div class="col-lg-6 col-md-12 col-xs-12 p-0 animate animate-left">
                    <!-- Start Fetatures -->
                    <div class="feature-item featured-border2">
                        <div class="feature-icon float-left">
                            {!! $featuresCard['icon'] !!}
                        </div>
                        <div class="feature-info float-left">
                            <h4>{{ __($featuresCard['title']) }}</h4>
                            <p>{{ __($featuresCard['text']) ?? 'Default Text'}}</p>
                        </div>
                    </div>
                    <!-- End Fetatures -->
                </div>
                <!-- End Col -->
            @endforeach


        </div>
        <!-- End Row -->
    </div>
</section>
<!-- Cool Fetatures Section End -->
