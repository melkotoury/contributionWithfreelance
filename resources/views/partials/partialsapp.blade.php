<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>I am a film | Submit Your Short Movie</title>
    <meta name="keywords" content="short films, films, festivals, submit your films, i am a film, film makers, submit my film to festivals">
    <meta name="description" content="submit your short film , film festivals , directors , editors , short films">
    <meta name="viewport" content="width=device-width">

    <meta property="og:title" content="Iamafilm | Submit Your Film">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.iamafilm.com">
    <meta property="og:site_name" content="Iamafilm">
    <meta property="og:description" content="short films, films, festivals, submit your films, i am a film, film makers, submit my film to festivals">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <link href="{{ asset('site') }}/css/jqvmap.css" media="screen" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/custom-styles.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/component.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script src="{{ asset('site') }}/js/lib/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <style type="text/css">

        .btn-primary{
            background-color: #ff755a!important;
            color: white;
            border-color: #ff755a!important;
        }
        .btn-primary:hover,.btn-primary:active,.btn-primary:visited,.btn-primary:focus{

            background-color: #ff7752 !important;
            color: white;
            border-color: #ff7752!important;
        }
        .btn-inverse{
            background: white;
            color: #ff755a;
            border-color: white;
        }
        .btn-inverse:active,.btn-inverse:hover,.btn-inverse:visited{
            background: #fffcfb;
            color: #ff755a;
            border-color: #fffcfb;
        }
    </style>

    <!-- Fav and touch icons -->
     @yield('header.scripts')

</head>

<body>

@include('partials.navbar')

@yield('content')
<!--Bottom Section-->
<section id="bottom">
    <div class="container">
        <div class="row margin-40">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <p>Dubai Media City Second Floor, Bldg. No. 2 (CNN Bldg.) | 00201222848061 | <a href="mailto:info@iamafilm.com"><i class="icon-envelope-alt"></i> info@iamafilm.com</a></p>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <!--Social Icons-->
                <ul class="social-icons">
                    <li><a class="twitter" href="http://www.twitter.com/rootcave" target="_blank"><i class="fa fa-twitter fa-3x"></i></a></li>
                    <li><a class="facebook" href="http://www.facebook.com/" target="_blank"><i class="fa fa-facebook fa-3x"></i></a></li>
                    <li><a class="google" href="http://www.googleplus.com/" target="_blank"><i class="fa fa-google-plus fa-3x"></i></a></li>
                    <li><a class="instagram" href="http://www.instagram.com/" target="_blank"><i class="fa fa-camera-retro fa-3x"></i></a></li>
                    <li><a class="pinterest" href="http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest fa-3x"></i></a></li>
                    <li><a class="linkedin" href="http://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin fa-3x"></i></a></li>
                    <li><a class="Github" href="http://www.github.com/" target="_blank"><i class="fa fa-github-alt fa-3x"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section>


<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>&copy; Copyrights. I am a film All Rights Reserved. Created by <a href="http://www.rootcave.com/">Root Cave.</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"><p><a href="{{url('/terms')}}">General Terms and Conditions </a></p></div>
            <div class="col-sm-3"><p><a href="{{url('/privacy')}}">Privacy </a></p></div>
            <div class="col-sm-3"><p><a href="{{url('/payment_refunding')}}">Payment and Refunding</a></p></div>
            <div class="col-sm-3">
                <p><a href="{{url('/about')}}">About</a></p>
            </div>
        </div>
    </div>
</section>


<!-- adding one meta tag for ajax compatability for all requests  -->
<meta name="_token" content="{!! csrf_token() !!}" />


<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../../../../../ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{ asset('site') }}/js/lib/bootstrap.min.js"></script>
<script src="{{ asset('site') }}/js/app/main.js"></script>

<script>
    ! function($) {
        $(function() {
            $('#header').carousel()
        })
    }(window.jQuery)
</script>
@yield('footer.scripts')



</body>

</html>