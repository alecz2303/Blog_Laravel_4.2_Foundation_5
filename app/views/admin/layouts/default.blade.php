<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>
		@section('title')
			Administration
		@show
	</title>

	<meta name="keywords" content="@yield('keywords')" />
	<meta name="author" content="@yield('author')" />
	<!-- Google will often use this as its description of your page/site. Make it good. -->
	<meta name="description" content="@yield('description')" />

	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
	<meta name="google-site-verification" content="">

	<!-- Dublin Core Metadata : http://dublincore.org/ -->
	<meta name="DC.title" content="Project Name">
	<meta name="DC.subject" content="@yield('description')">
	<meta name="DC.creator" content="@yield('author')">

	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<!-- This is the traditional favicon.
	 - size: 16x16 or 32x32
	 - transparency is OK
	 - see wikipedia for info on browser support: http://mky.be/favicon/ -->
	<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

	<!-- iOS favicons. -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
	<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('foundation/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('foundation/css/foundation.min.css')}}">
    <link rel="stylesheet" href="{{asset('foundation/css/responsive-tables.css')}}">
    <script src="{{asset('foundation/js/vendor/modernizr.js')}}"></script>
    <script src="{{asset('foundation/js/responsive-tables.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/prettify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/bootstrap-wysihtml5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/colorbox.css')}}">

    <!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/a5734b29083/integration/foundation/dataTables.foundation.css">
	  
	<!-- jQuery -->
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	  
	<!-- DataTables -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>

	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/a5734b29083/sorting/num-html.js"></script>


	@yield('styles')

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>
	<div class="header panel clearfix">
			
	</div>
		
		<!-- Navbar -->
		<div class="sticky">

		<nav class="top-bar" data-topbar role="navigation"> 
			<ul class="title-area">
				<li class="name"> 
					<h1><a href="{{{ URL::to('') }}}">Kerberos Blog</a></h1> 
				</li>
				<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    			<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li> 
			</ul> 
			<section class="top-bar-section"> 
				<!-- Right Nav Section --> 
				<ul class="right"> 
					<li><a href="{{{ URL::to('/') }}}">View Homepage</a></li>
    					<li class="divider-vertical"></li>
    					<li class="dropdown">
    							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
    								<span class="fa fa-user"></span> {{{ Auth::user()->username }}}	<span class="caret"></span>
    							</a>
    							<li class="has-dropdown">
							        <a href="{{{ URL::to('user/settings') }}}"><span class="fa fa-wrench"></span> Settings</a>
							        <ul class="dropdown">
							            <li><a href=""></a></li>
    								<li class="divider"></li>
    								<li><a href="{{{ URL::to('user/logout') }}}"><span class="fa fa-share"></span> Logout</a></li>
							        </ul>
							    </li>
    					</li>
				</ul> 
				<ul class="left">
        			<li{{ (Request::is('admin') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin') }}}"><span class="fa fa-home"></span> Home</a></li>
					<li{{ (Request::is('admin/blogs*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/blogs') }}}"><span class="fa fa-list-alt"></span> Blog</a></li>
					<li{{ (Request::is('admin/comments*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/comments') }}}"><span class="fa fa-bullhorn"></span> Comments</a></li>
					<li class="has-dropdown{{ (Request::is('admin/users*|admin/roles*') ? ' active' : '') }}">
				        <a href="{{{ URL::to('admin/users') }}}"><span class="fa fa-user"></span> Users <span class="caret"></span></a>
				        <ul class="dropdown">
				            <li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/users') }}}"><span class="fa fa-user"></span> Users</a></li>
							<li{{ (Request::is('admin/roles*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/roles') }}}"><span class="fa fa-user"></span> Roles</a></li>
				        </ul>
				    </li>

					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="">
							
						</a>
						<ul class="dropdown-menu">
							
						</ul>
					</li>
    			</ul>
			</section> 
		</nav>
		</div>
	<!-- Container -->
	<div class="wrap">
	<div class="container">

		<!-- Notifications -->
		@include('notifications')
		<!-- ./ notifications -->

		<!-- Content -->
		@yield('content')
		<!-- ./ content -->

		<!-- Footer -->
		<footer class="clearfix">
			@yield('footer')
		</footer>
		<!-- ./ Footer -->

	</div>
	</div>
	<!-- ./ container -->

	<!-- Javascripts -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{asset('assets/js/wysihtml5/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('assets/js/wysihtml5/bootstrap-wysihtml5.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/a5734b29083/integration/foundation/dataTables.foundation.js"></script>
    <script src="//cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>

    <script src="{{asset('assets/js/jquery.colorbox.js')}}"></script>
    <script src="{{asset('assets/js/prettify.js')}}"></script>

    <script type="text/javascript">
    	$('.wysihtml5').wysihtml5();
        $(prettyPrint);
    </script>
    <script src="{{asset('foundation/js/foundation.min.js')}}"></script>

    @yield('scripts')
    <script>
		$(document).foundation();
	</script>
</body>

</html>
