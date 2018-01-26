<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>I am a film | Dashboard</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('adminstration') }}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('adminstration') }}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('adminstration') }}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->

<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="{{ asset('adminstration') }}/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ asset('adminstration') }}/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ asset('adminstration') }}/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('adminstration') }}/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('adminstration') }}/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ asset('adminstration') }}/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<script src="{{ asset('adminstration') }}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

@yield('header.scripts')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="{{ url('admin/home') }}">
			<img src="{{ asset('site') }}/img/logo.png" alt="logo" class="logo-default image-responsive" width="60" height="40" style="padding-bottom: 7px;" />
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->


				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-envelope-open"></i>
					<span class="badge badge-default">
					{{ count(DB::table('contacts')->where('seen',0)->orderBy('id', 'desc')->get()) }} </span>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3>You have <span class="bold"> {{ count(DB::table('contacts')->where('seen',0)->orderBy('id', 'desc')->get()) }} New</span> Messages</h3>
							<a href="{{ url('admin/inbox') }}">view all</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                   @if(count(DB::table('contacts')->orderBy('id', 'desc')->get()) > 0 )

                    @foreach(DB::table('contacts')->orderBy('id', 'desc')->get() as $message)

								<li>
								 <a href="{{ url('admin/message').'/'.$message->id }}">

									<span class="subject">
									<span class="from">
									{{ $message->subject }} </span>
									<span class="time">{{ Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans() }} </span>
									</span>
									<span class="message">
									{{ str_limit($message->message,30) }} </span>
									</a>
								</li>


                    @endforeach

                  @endif



							</ul>
						</li>
					</ul>
				</li>
				<!-- END INBOX DROPDOWN -->
				<!-- BEGIN TODO DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="{{ asset('adminstration') }}/assets/admin/layout/img/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile">
					{{ Auth::user()->fullname }} </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="{{ url('admin/home') }}">
							<i class="icon-home"></i> Home </a>
						</li>
						<li>
							<a href="{{ url('admin/inbox') }}">
							<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
							3 </span>
							</a>
						</li>
						<li>
							<a href="{{ url('admin/festivals') }}">
							<i class="icon-rocket"></i> New Festivals <span class="badge badge-success">
							7 </span>
							</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="{{ url('admin/logout') }}">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="javascript:;" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->


				<li class="{{ Request::segment(2) == 'home' ? 'start active open' : '' }}">
					<a href="{{ url('admin/home') }}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					</a>
				</li>



				<!-- Show Users -->
				<li class="{{ Request::segment(2) == 'addelite' || Request::segment(2) == 'editelite' || Request::segment(2) == 'elite' ? 'start active open' : '' }}">
					<a href="javascript:;">
					<i class="fa fa-money"></i>
					<span class="title">Elite</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/elite') }}">
							<i class="icon-user"></i>
							Show Elites</a>
						</li>
						<li>
							<a href="{{ url('admin/addelite') }}">
							<i class="icon-plus"></i>
							Add Elite</a>
						</li>
					</ul>
			    </li>
			    <!-- End Show Users -->




				<!-- Show Users -->
				<li class="{{ Request::segment(2) == 'users' || Request::segment(2) == 'adduser' ? 'start active open' : '' }}">
					<a href="javascript:;">
					<i class="icon-users icon-3x"></i>
					<span class="title">Admin Users</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/users') }}">
							<i class="icon-user"></i>
							Show Admins</a>
						</li>
						<li>
							<a href="{{ url('admin/adduser') }}">
							<i class="icon-plus"></i>
							Add Admin</a>
						</li>
					</ul>
			    </li>
			    <!-- End Show Users -->


				<!-- Show Festival -->
				<li class="{{ Request::segment(2) == 'festivals' || Request::segment(2) == 'addfestival' ? 'start active open' : '' }}">
					<a href="javascript:;">
					<i class="fa fa-film"></i>
					<span class="title">Festivals</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/festivals') }}">
							<i class="fa fa-film"></i>
							Show Festivals</a>
						</li>
						<li>
							<a href="{{ url('admin/addfestival') }}">
							<i class="icon-plus"></i>
							Add Festival</a>
						</li>
					</ul>
			    </li>
			    <!-- End Show Festival -->




				<!-- Show Film makers -->
				<li class="{{ Request::segment(2) == 'filmmakers' || Request::segment(2) == 'addfilmmaker' ? 'start active open' : '' }}">
					<a href="javascript:;">
					<i class="fa fa-users" aria-hidden="true"></i>
					<span class="title">Film Makers</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/filmmakers') }}">
							<i class="fa fa-users" aria-hidden="true"></i>
							Show Film Makers</a>
						</li>
						<li>
							<a href="{{ url('admin/addfilmmaker') }}">
							<i class="icon-plus"></i>
							Add Film Maker</a>
						</li>
					</ul>
			    </li>
			    <!-- End Show Film makers -->

					<!-- Start Show Films -->
					<li class="{{ Request::segment(2) == 'films' ? 'start active open' : '' }}">
					<a href="javascript:;">
					<i class="fa fa-film" aria-hidden="true"></i>
					<span class="title">Films</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/films') }}">
							<i class="fa fa-film" aria-hidden="true"></i>
							Show Films </a>
						</li>

					</ul>
			    </li>
					<!--End Show Films  -->

					<!-- Start Show Submitted Films -->
					<li class="{{ Request::segment(2) == 'submitted_films' ? 'start active open' : '' }}">
					<a href="javascript:;">
					<i class="fa fa-film" aria-hidden="true"></i>
					<span class="title">Submitted Films</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/submitted_films') }}">
							<i class="fa fa-film" aria-hidden="true"></i>
							Show Submitted Films </a>
						</li>

					</ul>
			    </li>
					<!--End Show Submitted Films  -->


				<!-- Show programmers -->
				<li class="{{ Request::segment(2) == 'programmers' || Request::segment(2) == 'addprogrammer' ? 'start active open' : '' }}">
					<a href="javascript:;">
					<i class="fa fa-play-circle-o fa-4x"></i>
					<span class="title">Programmers</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/programmers') }}">
							<i class="fa fa-play-circle-o"></i>
							Show Programmers</a>
						</li>
						<li>
							<a href="{{ url('admin/addprogrammer') }}">
							<i class="icon-plus"></i>
							Add Programmer</a>
						</li>
					</ul>
			    </li>
			    <!-- End Show Programmers -->



				<!-- Show start transactions -->
				<li class="{{ Request::segment(2) == 'transactions' ? 'start active open' : '' }}">
					<a href="javascript:;">
					<i class="fa fa-credit-card fa-4x"></i>
					<span class="title">Transactions</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/transactions') }}">
							<i class="fa fa-money"></i>
							Submissions</a>
						</li>
						<li>
							<a href="{{ url('admin/transactions/films') }}">
							<i class="fa fa-money"></i>
							Adding Films</a>
						</li>
					</ul>
			    </li>
			    <!-- End Show  transactions -->






				<!-- start waiver codes -->
				<li class="{{ Request::segment(2) == 'waivers' ? 'start active open' : '' }}">
					<a href="{{ url('admin/waivers') }}">
					<i class="fa fa-money"></i>
					<span class="title">Waivers</span>
					<span class="selected"></span>
					</a>
				</li>
				<!-- end waiver codes -->





				<!-- Show Film makers -->
				<li class="{{ Request::segment(2) == 'inbox' || Request::segment(2) == 'compose' ? 'start active open' : '' }}">
					<a href="javascript:;">
					<i class="icon-envelope-open icon-3x"></i>
					<span class="title">Inbox</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{ url('admin/inbox') }}">
							<i class="icon-envelope-open"></i>
							Messages</a>
						</li>
						<li>
							<a href="{{ url('admin/compose') }}">
							<i class="icon-plus"></i>
							Compose</a>
						</li>
					</ul>
			    </li>
			    <!-- End Show Film makers -->







				<!-- Show Site Settings -->
				<li class="{{ Request::segment(2) == 'sitesetting' ? 'start active open' : '' }}">
					<a href="{{ url('admin/sitesetting') }}">
					<i class="fa fa-cogs" aria-hidden="true"></i>
					<span class="title">Site Setting</span>
					</a>
			    </li>
			    <!-- End Show Site Settings -->





			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->



	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			@yield('content')

	</div>
	<!-- END CONTENT -->


    <!-- adding one meta tag for ajax compatability for all requests  -->
    <meta name="_token" content="{!! csrf_token() !!}" />





	<!-- BEGIN QUICK SIDEBAR -->
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2014 &copy; <a href="http://www.rootcave.com/"> Rootcave </a>.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ asset('adminstration') }}/assets/global/plugins/respond.min.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{ asset('adminstration') }}/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset('adminstration') }}/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<script src="{{ asset('adminstration') }}/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="{{ asset('adminstration') }}/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('adminstration') }}/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

@yield('footer.scripts')

<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features
   Index.init();
   Index.initDashboardDaterange();
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
   ChartsAmcharts.init(); // init demo charts

});
</script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
