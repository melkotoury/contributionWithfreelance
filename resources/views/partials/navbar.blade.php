    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="img-responsive" href="{{ url('/') }}"><img  src="{{ asset('site') }}/img/logo.png" width="118" height="62" style="padding-top: 1px;" alt="logo"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>

                @if(Auth::check() && Auth::user()->type != 'festival_programmer'  && Auth::user()->type != 'admin' )
                    <li class="{{ in_array(Request::segment(1),usernames()) ? 'active' : '' }}"><a href="{{ url(Auth::user()->username) }}">Profile</a></li>
                    @endif


                    <li>
                        <!--class="dropdown-toggle" data-toggle="dropdown"-->
                        <!--<b class="caret"></b>-->
                    @if(Auth::check()) 
                    @if(Auth::user()->type == 'film_maker')                                       
                    <li  class="{{ Request::segment(1) == 'submit_film' ? 'active' : '' }}"><a href="{{ url('submit_film#1') }}">Submit a Film</a></li>
                    @endif
                    @endif

                    @if(Auth::check()) 
                    @if(Auth::user()->type == 'festival' || Auth::user()->type == 'festival_programmer')                                       
                    <li class="{{ Request::segment(1) == 'festival' && Request::segment(2) == 'films' ? 'active' : '' }}"><a href="{{ url('festival/films') }}">Submitted Films</a></li>
                    @endif
                    @endif

                    @if(Auth::check()) 
                    @if(Auth::user()->type == 'festival')                                       
                    <li class="{{ Request::segment(1) == 'festival' && Request::segment(2) == 'programmers' ? 'active' : '' }}"><a href="{{ url('festival/programmers') }}">Programmers</a></li>
                    @endif
                    @endif

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
                    <li class="dropdown {{ Request::segment(1) == 'map_film_maker' ||  Request::segment(1) == 'map_festivals' ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Map <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('map_film_maker') }}">Film Maker</a></li>
                            <li><a href="{{ url('map_festivals') }}">Festivals</a></li>
                        </ul>
                    </li>


                    @if(Auth::check()) 
                    @if(Auth::user()->type == 'festival')                                       
                    <li class="{{ Request::segment(1) == 'festival' &&  Request::segment(2) == 'editions' ? 'active' : '' }}"><a href="{{ url('festival/editions') }}">My Editions</a></li>
                    @endif
                    @endif

                    @if(Auth::check())  
                    @if(Auth::user()->type == 'film_maker')                                       
                    <li class="{{ Request::segment(1) == 'myfilms' || Request::segment(1) == 'my_private_films' || Request::segment(1) == 'my_pub_films' || Request::segment(1) == 'edit_film'  || Request::segment(1) == 'create_film' ? 'active' : ''  }}"><a href="{{ url('myfilms') }}">My Films</a></li>
                    @endif
                    @endif
                    <li class="{{ Request::segment(1) == 'contact' ? 'active' : ''  }}"><a href="{{ url('contact') }}">Contact</a></li>

                    @if(!Auth::check())
                    <li class="login-menu"><a class="login-pad" href="{{ url('login') }}" role="button" data-toggle="" data-target=""><i class="fa fa-lock" aria-hidden="true"></i>  Login</a></li>
                    @endif
                    @if(Auth::check())
                    <li class="dropdown {{ Request::segment(1) == 'edit' ? 'active' : ''  }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    
                     <!-- check if file exists -->
                    @if(Auth::user()->type == 'film_maker')
                    <?php $user = \App\User::showFilmMaker(Auth::user()->username) ?>
                    @if(file_exists('images/filmmakers/'.$user->photo ))
                        <img alt="" src="{{ url('/') }}/images/filmmakers/{{$user->photo}}" style="height: 24px; width: 24px;" alt="" class="img-responsive img-circle user-img">
                    @else
                    <img alt="" src="http://placehold.it/24x24?text=no image">
                    @endif
                    @endif
                    <!-- end check file -->
                    <!-- check if file exists -->
                    @if(Auth::user()->type == 'festival')
                    <?php $user = \App\User::showFestival(Auth::user()->username) ?>
                    @if(file_exists('images/festivals/square/'.$user->logo_url ))
                        <img alt="" src="{{ url('/') }}/images/festivals/square/{{$user->logo_url}}" style="height: 24px; width: 24px;" alt="" class="img-responsive img-circle user-img">
                    @else
                    <img alt="" src="http://placehold.it/24x24?text=no image">
                    @endif
                    @endif
                    <!-- end check file -->

                         <span> {{ str_limit(Auth::user()->fullname, 14 ) }}</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            
                            @if(Auth::user()->type == 'festival_programmer' || Auth::user()->type == 'admin')
                            @else
                            <li><a href="{{ url(Auth::user()->username) }}"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
                            <li><a href="{{ url('edit').'/'.Auth::user()->username }}"><i class="fa fa-gear" aria-hidden="true"></i> Edit Profile</a></li>
                            @endif

                             @if(Auth::user()->type == 'film_maker')
                            <li><a href="{{ url('myfilms') }}"><i class="fa fa-film" aria-hidden="true"></i> My Films</a></li>
                            @endif

                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>
