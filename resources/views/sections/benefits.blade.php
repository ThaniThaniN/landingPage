<style>
    @media (orientation: landscape) and (max-height: 600px){
        .mobile-landscape-layout {
            margin-top: 700px;

        }
    }
</style>
<section id="benefits" class="section-padding mobile-landscape-layout">
    <div class="container mt-md-5">
        <div class="section-header text-center mt-md-5">
             <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">
                 {{ __($allSections['benefits']['title']) }}
             </h2>
            <p>{{ __($allSections['benefits']['text']) ?? '' }}</p>
            <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
            @foreach($benefitsCards as $benefitsCard)
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="table wow fadeInLeft" data-wow-delay="1.2s">
                        <div class="icon-box">
                            {!! $benefitsCard['icon'] !!}
                        </div>
                        <div class="title">
                            <h3>{{ __($benefitsCard['title']) }}</h3>
                        </div>
                        <p class="mb-4">{{ __($benefitsCard['text']) }}</p>
{{--                        <button class="benefit-btn-common">Premium thani service</button>--}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
