<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Roboto", sans-serif;
    }

    .wrapper {
        max-width: 75%;
        margin: auto;
    }

    .wrapper > h1 {
        margin: 1.5rem 0;
        text-align: center;
        color: #fff;
        letter-spacing: 3px;
    }
    .accordion {
        background-color: #1ec0df;
        color: #fff;
        cursor: pointer;
        font-size: 1.2rem;
        width: 100%;
        padding: 1rem 2rem;
        border: none;
        outline: none;
        transition: 0.4s;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
        border-radius: 5px;
    }

    .accordion i {
        font-size: 1.6rem;
        transition: .3s;
    }
    .accordion.activeAccordion  i {
        transform: rotate(180deg);
    }
    .activeAccordion,
    .accordion:hover {
        background-color: #183964;
    }
    .pannel {
        padding: 0 2rem 2.5rem 2rem;
        overflow: hidden;
        /*background-color: #353550;*/
        display: none;
    }
    .pannel p {
        color: #fff;
        font-size: 1.2rem;
        line-height: 1.2;
    }

    .faq {
        border-radius: 5px;
        margin: 10px 0;
    }
    .faq.activeAccordion {
        /*border: none;*/
    }

    @media (max-width:578px){
        .wrapper {
            max-width: 90%;
            margin: auto;
        }

        .wrapper > h1 {
            margin: 3rem 0;
            font-size: 1.1rem;
        }
        .accordion {
            text-align: left;
            font-size: 1rem;
            padding: 1rem 1rem;
        }
        .pannel {
            padding: 0 1rem 2rem 1rem;
        }
        .pannel p {
            font-size: 1rem;
        }
    }
</style>
<div id="faq" class="wrapper">
    <!-- Start Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="features-text section-header text-center">
                <div>
                    <h2 class="section-title animate animate-up-medium">{{ __($allSections['faq']['title']) }}</h2>
                    <div class="desc-text animate animate-up-medium">
                        <p>{{ __($allSections['faq']['text']) }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Row -->

    @foreach($faqCards as $faqCard)
        <div class="faq animate animate-left-medium">
            <button class="accordion">
                {{ __($faqCard['title'])  }}
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>{{ __($faqCard['text'])  }}</p>
            </div>
        </div>
    @endforeach
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("activeAccordion");
            this.parentElement.classList.toggle("activeAccordion");

            var pannel = this.nextElementSibling;

            if (pannel.style.display === "block") {
                pannel.style.display = "none";
            } else {
                pannel.style.display = "block";
            }
        });
    }
</script>
