<head>
 	<link rel="stylesheet" href="{{ asset('site/css/home/home.css') }}">
	<link href="{{ asset('site/css/home/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
	<link href="{{ asset('site/css/home/style.css') }}" type="text/css" rel="stylesheet" media="all">
	<link href="{{ asset('site/css/home/font-awesome.css') }}" rel="stylesheet"> <!-- font-awesome icons -->
	<link rel="stylesheet" href="{{ asset('site/css/home/flexslider.css') }}" type="text/css" media="screen" property="" />
</head>
	<body>
@extends('partials.partialsapp')



@section('header.scripts')


@stop


@section('content')


{{--<div class="w3ls-banner jarallax">--}}
		{{--<div class="w3lsbanner-info">--}}
			{{--<!-- banner-text -->--}}
			{{--<div class="banner-text agileinfo"> --}}
				{{--<div class="container">--}}
					{{--<div class="agile_banner_info">--}}
						{{--<div class="agile_banner_info1">--}}
							{{--<h6>Quis nostrum exercitationem </h6>--}}
							{{--<div id="typed-strings" class="agileits_w3layouts_strings">--}}
								{{--<p>Welcome to<i> Iam A Film</i></p>--}}
								{{--<p><i>Pulvinar</i> Vitae Site</p>--}}
								{{--<p>Curabi temlaci <i>Pharetra</i></p>--}}
							{{--</div>--}}
							{{--<span id="typed" style="white-space:pre;"></span>--}}
						{{--</div>--}}
					{{--</div> --}}
					{{--<div class="agile_social_icons_banner">--}}
						{{--<ul class="agileits_social_list">--}}
							{{--<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
							{{--<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
							{{--<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>--}}
							{{--<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>--}}
						{{--</ul>--}}
					{{--</div> --}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<!-- //banner-text -->  --}}
		{{--</div>	--}}
	{{--</div>	--}}
	<!-- //banner -->
	<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="col-md-4 bnr-agileitsgrids" >
			<div class="agileinfo_banner_bottom_pos">
				<div class="w3_agileits_banner_bottom_pos_grid">
					<div class="col-xs-2 wthree_banner_bottom_grid_left">
						<div class="agile_banner_bottom_grid_left_grid hvr-radial-out">
							<i class="fa fa-user" aria-hidden="true"></i>
						</div>
					</div>

					<div class="col-xs-10 wthree_banner_bottom_grid_right">
						<h4>Create Account</h4>
						<p>Join the social network and have a profile with your biography, filmography,awards and contact info also connect all your social media accounts to your profile. Its like your website with a special url(your username)</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="col-md-4 bnr-agileitsgrids w3grid1" >
			<div class="agileinfo_banner_bottom_pos">
				<div class="w3_agileits_banner_bottom_pos_grid">
					<div class="col-xs-2 wthree_banner_bottom_grid_left">
						<div class="agile_banner_bottom_grid_left_grid hvr-radial-out">
							<i class="fa fa-film" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-xs-10 wthree_banner_bottom_grid_right">
						<h4>Create Your Film</h4>
						<p>Create your private (new) film and submit it to unlimited number of film festivals for unlimited time just for 40$. Create your public (old) film for everyone to watch on your profile for free</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="col-md-4 bnr-agileitsgrids w3grid2" >
			<div class="agileinfo_banner_bottom_pos">
				<div class="w3_agileits_banner_bottom_pos_grid">
					<div class="col-xs-2 wthree_banner_bottom_grid_left">
						<div class="agile_banner_bottom_grid_left_grid hvr-radial-out">
							<i class="fa fa-map" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-xs-10 wthree_banner_bottom_grid_right">
						<h4>Discover The Map</h4>
						<p>Explore other festivals filmmakers profiles by clicking on each country and watch their public film. Countries are listed by oldest user appears first.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!-- //banner-bottom -->

		<!-- blog-bottom -->
	<div class="blog-bottom">
			<div class="col-sm-4 mockup-profile">
				<img src="{{ url('site') }}/img/mockups/profile.png" alt=" " class="img-responsive" />
			</div>
			<div class="col-sm-4 mockup-submit">
				<img src="{{ url('site') }}/img/mockups/submit.png" alt=" " class="img-responsive" />
			</div>

			<div class="col-sm-4 mockup-map">
				<img src="{{ url('site') }}/img/mockups/map.png" alt=" " class="img-responsive" />
			</div>

			<div class="clearfix"> </div>
	</div>

	<!-- //blog-bottom -->
	<!-- services -->
	{{--<div class="services jarallax">--}}
		{{--<div class="container">   --}}
			{{--<h3 class="agileits-title w3title1">Our Services</h3>--}}
			{{--<div class="services-w3ls-row">--}}
				{{--<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts">--}}
					{{--<span class="glyphicon glyphicon-home effect-1" aria-hidden="true"></span>--}}
					{{--<h5>Lorem ipsum</h5>--}}
					{{--<p>Itaque earum rerum hic a sapiente delectus in auctor sapien.</p>--}}
				{{--</div>--}}
				{{--<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts">--}}
					{{--<span class="glyphicon glyphicon-list-alt effect-1" aria-hidden="true"></span>--}}
					{{--<h5>Ut non lacus</h5>--}}
					{{--<p>Itaque earum rerum hic a sapiente delectus in auctor sapien.</p>--}}
				{{--</div>--}}
				{{--<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts">--}}
					{{--<span class="glyphicon glyphicon-tree-deciduous effect-1" aria-hidden="true"></span>--}}
					{{--<h5>Maec rutrum</h5>--}}
					{{--<p>Itaque earum rerum hic a sapiente delectus in auctor sapien.</p>--}}
				{{--</div>--}}
				{{--<div class="col-md-3 col-sm-3 col-xs-6 services-grid">--}}
					{{--<span class="glyphicon glyphicon-globe effect-1" aria-hidden="true"></span>--}}
					{{--<h5>Phase gravida</h5>--}}
					{{--<p>Itaque earum rerum hic a sapiente delectus in auctor sapien.</p>--}}
				{{--</div> --}}
				{{--<div class="clearfix"> </div>--}}
			{{--</div>  --}}
		{{--</div> --}}
	{{--</div>--}}
	<!-- //services -->

{{-- signup --}}

<div class="signup">
  <div class="container-fluid">
    <h3 class="agileits-title w3title1 text-center white"> Join Us</h3>
    <div class="row">
      <div class="text-center">
        <a data-toggle="modal" data-target="#modal-container-3495" class="btn btn-primary ">SIGNUP AS FESTIVAL</a>
        <a href="/signup" class="btn btn-primary ">SIGNUP AS FILMMAKER</a>
      </div>
    </div>
  </div>
</div>
<!-- services -->
	<div class="img-logo">
		<div class="container-fluid">
			<h3 class="agileits-title w3title1 text-center black"> Festivals</h3>
			<div class="services-w3ls-row">

				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/1.jpg" alt=" " class="img-responsive " /></span>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/2.jpg" alt=" " class="img-responsive " /></span>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/3.jpg" alt=" " class="img-responsive " /></span>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/4.jpg" alt=" " class="img-responsive " /></span>
				</div>

				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/5.jfif" alt=" " class="img-responsive " /></span>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/6.jpg" alt=" " class="img-responsive " /></span>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/7.png" alt=" " class="img-responsive " /></span>
				</div>

				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/8.jpg" alt=" " class="img-responsive " /></span>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/9.png" alt=" " class="img-responsive " /></span>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/10.jpg" alt=" " class="img-responsive " /></span>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/11.JPG" alt=" " class="img-responsive " /></span>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6 services-grid agileits-w3layouts logo">
					<span class="logo-bg" aria-hidden="true"> <img src="{{ url('site') }}/img/festivals/12.png" alt=" " class="img-responsive " /></span>
				</div>


			</div>

			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<a href="{{url('/our_festivals')}}" class="btn btn-primary btn-block">See more...</a>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
	<!-- //services -->


{{-- <div class="container content ">
	<h3 class="agileits-title w3title1 pricing-text text-center">Pricing List</h3>
	<div class="row">
		<!-- Pricing -->
		<div class="col-md-5">
			<div class="pricing pricing-active hover-effect">
				<div class="pricing-head ">
					<h3>Expert <span>
					Officia deserunt mollitia </span>
					</h3>
					<h4><i>$</i>13<i>.99</i>
					<span>
					Per Month </span>
					</h4>
				</div>
				<ul class="pricing-content list-unstyled">
					<li>
						At vero eos
					</li>
					<li>
						No Support
					</li>
					<li>
						Fusce condimentum
					</li>
					<li>
						Ut non libero
					</li>
					<li>
						Consecte adiping elit
					</li>
				</ul>
				<div class="pricing-footer">
					<p>
						 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
					</p>
					<a href="javascript:;" class="btn yellow-crusta">
					Sign Up
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-5 col-md-offset-2">
			<div class="pricing pricing-active hover-effect">
				<div class="pricing-head ">
					<h3>Hi-Tech <span>
					Officia deserunt mollitia </span>
					</h3>
					<h4><i>$</i>99<i>.00</i>
					<span>
					Per Month </span>
					</h4>
				</div>
				<ul class="pricing-content list-unstyled">
					<li>
						At vero eos
					</li>
					<li>
						No Support
					</li>
					<li>
						Fusce condimentum
					</li>
					<li>
						Ut non libero
					</li>
					<li>
						Consecte adiping elit
					</li>
				</ul>
				<div class="pricing-footer">
					<p>
						 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
					</p>
					<a href="javascript:;" class="btn yellow-crusta">
					Sign Up
					</a>
				</div>
			</div>
		</div>
		</div>
		</div> --}}
		<!--//End Pricing -->
    <!-- start FESTIVAL modal -->
     <div class="modal fade" id="modal-container-3495" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">

               <h4 class="modal-title" id="myModalLabel21">
                 Confirmation
               <button  type="button" class="close " data-dismiss="modal" aria-hidden="true">
                 ×
               </button>
               </h4>
             </div>
             <div class="modal-body">
               <!-- start modal body -->
                     <h4 class="text-center">Just to make sure you are a real festival .</h4>
                     <h4 class="text-center"> Please contact us at info@iamafilm.com to create your account</h4>


                       </div>
                  </form>
            <div class="modal-footer">
                              <form role="form" id="form_delete">
                       <div class="form-group">
                       </div>
                       <div class="form-group">
                        <input type="hidden" id="product_id_delete" name="product_id" value="0">

                           <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>

                           </button>


                          <!-- <button class="btn btn-danger" id="submit_delete_comp"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button> -->
                       </div>
                  </form>

            </div>


               <!-- end modal body -->
             </div>



           </div>

         </div>

       </div>
       <!-- end FESTIVAL modal -->
@stop


@section('footer.scripts')
<script src="{{ asset('site') }}/js/home/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- jarallax -->
	<script src="{{ asset('site') }}/js/home/SmoothScroll.min.js"></script>
	<script src="{{ asset('site') }}/js/home/jarallax.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	<!-- //jarallax -->
	<!-- ResponsiveTabs js -->
	<script src="{{ asset('site') }}/js/homejs/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true   // 100% fit in a container
			});
		});
	</script>
	<!-- //ResponsiveTabs js -->
	<!-- banner-type-text -->
	<script src="{{ asset('site/js/home/typed.js') }}" type="text/javascript"></script>
    <script>
		$(function(){

			$("#typed").typed({
				// strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
				stringsElement: $('#typed-strings'),
				typeSpeed: 30,
				backDelay:700,
				loop: true,
				contentType: 'html', // or text
				// defaults to false for infinite loop
				loopCount: false,
				callback: function(){ foo(); },
				resetCallback: function() { newTyped(); }
			});

			$(".reset").click(function(){
				$("#typed").typed('reset');
			});

		});
		function newTyped(){ /* A new typed object */ }

		function foo(){ console.log("Callback"); }
    </script>
	<!-- //banner-type-text -->
	<!-- flexSlider -->
	<script defer src="{{ asset('site/js/home/jquery.flexslider.js') }}"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- //flexSlider -->
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="{{ asset('site/js/home/move-top.js') }}"></script>
	<script type="text/javascript" src="{{ asset('site/js/home/easing.js') }}"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();

			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('site') }}/js/home/bootstrap.js"></script>
@stop
	</body>
