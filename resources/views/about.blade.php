@extends('partials.partialsapp')



@section('header.scripts')
    <link rel="stylesheet" href="{{ url('site') }}/css/vendors/animate.css">

    <style>
        .items{
            background: white;
            z-index: 3;
        }

        h3.page-title{
            color: #eb3d39;
        }
        p.page-paragraph{
            color: black;
            text-decoration: dotted;

        }
        .white-bg{
            background: white;
            z-index: 3;
        }
        .padding-down{
            padding-bottom: 20px;
        }
        .submission-platform{
            background: #f04840;
            padding: 10px;
        }
        .submission-platform p{
           color: white;
        }
        .social-platform{
            background: black;
            padding: 20px;
        }
        .social-platform p{
            color: white;
        }
        .map-platform{
            background: #f04840;
            padding: 20px;
        }
        .map-platform p{
            color: white;
        }
        .other-platform{
            background: black;
            padding: 20px;
        }
        .other-platform p{
            color: white;
        }

    </style>

@stop

@section('content')

    <!--Content-->
    <section id="page-title" class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="page-title">About Us</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="submission-platform white-bg padding-down">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 animated infinite bounceInLeft">
                    <p>I am a film is a submission platform that connects filmmakers to film festivals and gives the chance for filmmakers to send their films to festivals that are applicable to their films </p>
                </div>
                <div class="col-sm-4 animated infinite bounceInRight">
                    <img src="{{ url('site') }}/img/about/submission.jpg" alt="" class="img img-responsive">

                </div>
            </div>
        </div>
    </section>
    <section class="social-platform white-bg padding-down">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 animated infinite bounceInLeft">
                    <img src="{{ url('site') }}/img/about/profile.jpg" alt="" class="img img-responsive">
                </div>
                <div class="col-sm-8 animated infinite bounceInRight">
                    <p>I am a film is a social network for filmmakers and film festivals each user create a profile with all their information and for filmmakers they can share the old ( public films ) for each one to watch them and know all information about the film from the film’s page </p>
                </div>

            </div>
        </div>
    </section>
    <section class="map-platform white-bg padding-down">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 animated infinite bounceInLeft">
                    <p>Through the map any one can discover new filmmaker and/or new film festivals and click to go to their profiles </p>
                </div>
                <div class="col-sm-4 animated infinite bounceInRight">
                    <img src="{{ url('site') }}/img/about/map.jpg" alt="" class="img img-responsive">
                </div>
            </div>
        </div>
    </section>

    <section class="other-platform white-bg padding-down">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 animated infinite bounceInLeft">
                    <p>Also film festivals can put their old editions lists from my edition to appear on their profiles  </p>
                </div>
                <div class="col-sm-3 animated infinite bounceInLeft">
                    <p>I am a film is the first submission platform in the Arab world, Africa </p>
                </div>
                <div class="col-sm-3 animated infinite bounceInLeft">
                    <p>I am a film presents more services for filmmakers like creating dcp and/or blu-ray </p>
                </div>
                <div class="col-sm-3 animated infinite bounceInLeft">
                    <p>Every Profile for a film maker of a film festival will have a special Url (for example www.iamafilm.com/yourname ) that you can send it and it contains all your information and films</p>
                </div>
            </div>
        </div>
    </section>





@stop


@section('footer.scripts')
    <script>

        !function(t) {
            "use strict";
            t("a.page-scroll").bind("click", function(a) {
                var o = t(this);
                t("html, body").stop().animate({
                    scrollTop: t(o.attr("href")).offset().top - 50
                }, 1250, "easeInOutExpo"),
                    a.preventDefault()
            }),
                t("body").scrollspy({
                    target: ".navbar-fixed-top",
                    offset: 100
                }),
                t(".navbar-collapse ul li a").click(function() {
                    t(".navbar-toggle:visible").click()
                }),
                t("#mainNav").affix({
                    offset: {
                        top: 50
                    }
                })
        }(jQuery);

    </script>
@stop