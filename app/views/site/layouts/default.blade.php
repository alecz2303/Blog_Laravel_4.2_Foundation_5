<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Kerberos Blog
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Jon Doe" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- CSS
		================================================== -->
		<link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{asset('foundation/css/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('foundation/css/foundation.min.css')}}">
        <script src="{{asset('foundation/js/vendor/modernizr.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
		<style>
	        @section('styles')
			@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!-- [if lt IE 9] -->
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<!-- [endif] -->

		<!-- Favicons ================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
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
					@if (Auth::check())
	                    @if (Auth::user()->hasRole('admin'))
	                    	<li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
	                    @endif
	                    <li><a href="{{{ URL::to('user') }}}">Logged in as {{{ Auth::user()->username }}}</a></li>
	                    <li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
                    @else
	                    <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
	                    <li {{ (Request::is('user/create') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
                    @endif
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
		</div>
		<!-- ./ container -->

		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>
		</div>
		<!-- ./wrap -->


	    <div id="footer">
	      <div class="container panel clearfix">
	        <p class="muted credit">Kerberos IT Services.</p>
	      </div>
	    </div>

		<!-- Javascripts
		================================================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="{{asset('foundation/js/foundation.min.js')}}"></script>

        @yield('scripts')
        <script>
			$(document).foundation();
		</script>
	</body>
</html>