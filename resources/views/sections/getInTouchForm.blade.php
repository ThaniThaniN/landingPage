<!-- Contact Us Section -->
<section id="contact" class="section">
    <!-- Container Starts -->
    <div class="container">
        <!-- Start Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-text section-header text-center">
                    <div>
                        <h2 class="section-title">@lang('Get in touch')</h2>
                        <div class="desc-text">
                            <p>@lang('Share your opinion and questions with us, and we will be happy to answer them.')</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row">
            <!-- Start Col -->
            <div class="col-lg-6 col-md-12">
                <form id="contactForm" method="POST" action="/suggestion-request">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-form-input id="name" name="name" placeholder="{{ __('name') }}" value="{{ old('name') }}" required></x-form-input>
                                <x-form-input-error name="name"></x-form-input-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-form-input placeholder="{{ __('whatsapp number') }}" id="phone" value="{{ old('phone') }}" name="phone" required></x-form-input>
                                <x-form-input-error name="phone"></x-form-input-error>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" id="message"  name="message" placeholder="{{ __('your message') }}" rows="4" required>{{ old('message') }}</textarea>
                                <x-form-input-error name="message"></x-form-input-error>
                            </div>
                            <div class="submit-button">
                                <x-form-button>@lang('submit')</x-form-button>
                                <div id="msgSubmit" class="h3 hidden"></div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Col -->
            <!-- Start Col -->
            <div class="col-lg-1">

            </div>
            <!-- End Col -->
            <!-- Start Col -->
            <div class="col-lg-4 col-md-12">
                <div class="contact-img">
                    <img src="img/5124558.png" class="img-fluid" alt="" style="transform: scale(1.5);">
                </div>
            </div>
            <!-- End Col -->
            <!-- Start Col -->
            <div class="col-lg-1">
            </div>
            <!-- End Col -->

        </div>
        <!-- End Row -->
    </div>
</section>
<!-- Contact Us Section End -->
