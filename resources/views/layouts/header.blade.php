<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>I am a film | Submit Your Short Movie</title>
    <meta name="keywords" content="short films, films, festivals, submit your films, i am a film, film makers, submit my film to festivals">
    <meta name="description" content="submit your short film , film festivals , directors , editors , short films">
    <meta name="viewport" content="width=device-width">

    <meta property="og:title" content="Iamafilm |  Submit Your Film">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.iamafilm.com">
    <meta property="og:site_name" content="Iamafilm">
    <meta property="og:description" content="short films, films, festivals, submit your films, i am a film, film makers, submit my film to festivals">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <link href="css/jqvmap.css" media="screen" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/custom-styles.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/component.css">



    <script src="{{ asset('site') }}/js/lib/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Fav and touch icons -->
     @yield('header.scripts')

</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand img-responsive" href="index.html"><img class="brand-logo" src="{{ asset('site') }}/img/logo.png" alt="logo"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="profile.html">Profile</a></li>

                    <li>
                        <!--class="dropdown-toggle" data-toggle="dropdown"-->
                        <!--<b class="caret"></b>-->
                        <a href="submit_film.html">Submit a Film </a>
                        <!--<ul class="dropdown-menu">-->
                        <!--<li><a href="full-width.html">Full Width</a></li>-->
                        <!--<li><a href="services.html">Services</a></li>-->
                        <!--<li><a href="about.html">About</a></li>-->
                        <!--<li><a href="team.html">Team</a></li>-->
                        <!--<li><a href="pricing.html">Pricing</a></li>-->
                        <!--<li><a href="blog.html">Blog Loop</a></li>-->
                        <!--<li><a href="blog-article.html">Blog Article</a></li>-->
                        <!--<li><a href="login.html">Log In</a></li>-->
                        <!--<li><a href="signup.html">Sign Up</a></li>-->
                        <!--<li><a href="icons.html">Icons</a></li>-->
                        <!--</ul>-->
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Map <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="map_film_maker.html">Film Maker</a></li>
                            <li><a href="map_festivals.html">Festivals</a></li>
                        </ul>
                    </li>
                    <!--<li><a href="blog.html">Blog</a></li>-->
                    <li><a href="my_films.html">My Films</a></li>
                    <li><a href="contact.html">Contact</a></li>


                    <li class="login-menu"><a class="login-pad" href="{{ url('login') }}" role="button" data-toggle="" data-target=""><i class="fa fa-lock" aria-hidden="true"></i>  Login</a></li>
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('site') }}/img/users/bahaa.jpg" style="height: 24px; width: 24px;" alt="" class="img-responsive img-circle user-img"> <span> bahaa el gamal</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="iamafilm.html"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
                            <li><a href="edit_profile.html"><i class="fa fa-gear" aria-hidden="true"></i> Edit Profile</a></li>
                            <li><a href="my_films.html"><i class="fa fa-film" aria-hidden="true"></i> My Films</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>