<x-layout>
    <!-- Contact Us Section -->
    <section id="contact" class="section">
        <!-- Container Starts -->
        <div class="container">
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-text section-header text-center">
                        <div>
                            <h2 class="section-title">@lang('Submit Your Request Now for a Free Trial')</h2>
                            <div class="desc-text">
                                <p>@lang('After submitting your request, one of our team members will contact you on WhatsApp using the number you provided within 24 hours to follow up on your request.')</p>
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
                    <form id="contactForm" method="POST" action="/product-request">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-form-input placeholder="{{ __('business name') }}" id="bName" value="{{ old('bName') }}" name="bName" required></x-form-input>
                                    <x-form-input-error name="bName"></x-form-input-error>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-form-input id="branches" name="branches" placeholder="{{ __('number of branches') }}" value="{{ old('branches') }}" required></x-form-input>
                                    <x-form-input-error name="branches"></x-form-input-error>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message"  name="message" placeholder="{{ __('Any Additional Questions or Information') }}" rows="4" required>{{ old('message') }}</textarea>
                                    <x-form-input-error name="message"></x-form-input-error>
                                </div>
                                <div class="submit-button">
                                    <x-form-button>Submit</x-form-button>
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
                <div class="col-lg-4 col-md-12" style="margin: 50px 0">
                    <div class="contact-img">
                        <img src="img/5124107.png" class="img-fluid" alt="" style="transform: scale(1.7);">
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
    @include('sections.footer')

</x-layout>
