
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MiniMap </title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />



		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}">

		
		
		
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset('assets/css/flux/gmap.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/ace-fonts.css') }}">
		
		

		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}">
		
		<!--
		<link rel="stylesheet" href="../assets/css/ace.min.css" id="main-ace-style" />
		-->
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}">
		
		
		
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/ace-extra.min.js') }}"></script>
		
		

	@yield('header')
			
	</head>

	<body class="skin-3">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="{{ URL::to('home') }}" class="navbar-brand">
						<i class="menu-icon fa fa-map-marker"></i>
						<small>
							MiniMap
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!--<img class="nav-user-photo" src="../assets/avatars/user.jpg" alt="Jason's Photo" />-->
								<span class="user-info">
									<small>Bienvenido,</small>
									{{ Auth::user()->login }}									
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<li class="divider"></li>

								<li>
									<a href="{{ URL::route('logout') }}">
										<i class="ace-icon fa fa-power-off"></i>
										Cerrar Sesión
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul><!-- Fin Notificaciones -->
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
				

				@yield('sidebar')
				<ul class="nav nav-list">
				
					
					<li class="">
						<a href="{{ URL::to('mapas') }}">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text">Mapa</span>
						</a>
					</li>
					<li class="">
						<a href="{{ URL::to('flags') }}">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">Flags</span>
						</a>
					</li>
					<li class="">
						<a href="{{ URL::to('usuarios') }}">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">Usuarios</span>
						</a>
					</li>
					
					<li class="">
						<a href="{{ URL::to('beneficios') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text">Beneficios</span>
						</a>
					</li>
					<li class="">
						<a href="#">
							<i class="menu-icon fa fa-envelope disabled"></i>
							<span class="menu-text">Push</span>
						</a>
					</li>
					<li class="">
						<a href="#">
							<i class="menu-icon fa fa-signal disabled"></i>
							<span  class="menu-text">Estadisticas</span>
						</a>
					</li>
				
					
					
				</ul>
				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<!-- #section:basics/content.breadcrumbs -->
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="{{ URL::to('home') }}">Inicio</a>
						</li>
						
						@yield('breadcrumbs')
					</ul><!-- /.breadcrumb -->

					
				</div>

				<!-- /section:basics/content.breadcrumbs -->
				<div class="page-content">
					<!-- #section:settings.box -->
					
					<!-- Aquí estaba script para elegir color -->

					<!-- /section:settings.box -->
					<div class="page-content-area">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								@yield('content')
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<a  target="_blank">PROYECTO DE TITULO 2017</a>
						</span>

						&nbsp; &nbsp;
						
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		
		<script src="{!! asset('assets/js/bootstrap-datepicker.js') !!}"></script>
		<script src="{!! asset('assets/js/datepicker/locales/bootstrap-datepicker.es.js') !!}"></script>
		<script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
		
		
		
		
		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="{!! asset('assets/js/ace-elements.min.js') !!}	"></script>
		<script src="{!! asset('assets/js/ace.min.js') !!}"></script>
			
		
		
		@yield('extra_js')

	</body>
</html>
