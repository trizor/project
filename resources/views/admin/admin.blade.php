<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>CarOnline</title>

	<link rel="shortcut icon" href="/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/style.css">
<script src="/scripts/scripts.js"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="/js/html5shiv.js"></script>
	<script src="/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="/home">CarOnline</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
				             <li><a href="/admin/cars">Автомобили</a></li>
                             <li><a href="/admin/add_manager">Добавление менеджеров</a></li>
                             <li><a href="/admin/control_users" >Пользователи</a></li>
                             <li><a href="/admin/register_rent_period" >Отчеты</a></li>
					<li class="dropdown">


                         						@if (Auth::guest())
                         						                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Вход<b class="caret"></b></a>
                                                                            <ul class="dropdown-menu">
                                                    						<li><a href="{{ url('login') }}">Вход</a></li>
                                                    						<li><a href="{{ url('register') }}">Регистрация</a></li>
                                                    						</ul>
                                                    						                     					</li>

                                                                            				</ul>
                                                    					@else
                                                                                	<li><a href="#">{{ Auth::user()->name }}</a></li>
                                                    								<li><a href="{{ url('/auth/logout') }}">Выход</a></li>
                                                    								</li>
                                                                                   </ul>
                                                    					@endif




			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">CarOnline</h1>
				<h3><p class="transition-scale">Живи в движении</p></h3>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	@yield('information')
	<!-- /Intro-->
	<!-- container -->
@yield('content')
<!-- /container -->


	<footer id="footer" class="top-space">

    		<div class="footer1">
    			<div class="container">
    				<div class="row">

    					<div class="col-md-3 widget">
    						<h3 class="widget-title">Контакты</h3>
    						<div class="widget-body">
    							<p>(057) 336-83-50<br>
    								<a href="mailto:#">caronlineone@gmail.com</a><br>
    								<br>
    								Целиноградская 40, Харьков, Украина.
    							</p>
    						</div>
    					</div>



    					<div class="col-md-6 widget">
    						<h3 class="widget-title"></h3>
    						<div class="widget-body">

    						</div>
    					</div>

    				</div> <!-- /row of widgets -->
    			</div>
    		</div>

    		<div class="footer2">
    			<div class="container">
    				<div class="row">

    					<div class="col-md-6 widget">
    						<div class="widget-body">
    							<p class="simplenav">

                                                           <a href="/admin/cars">Автомобили</a>|
                                                           <a href="/admin/add_manager">Добавление менеджеров</a>|
                                                           <a href="/admin/control_users" >Пользователи</a>|
                                                           <a href="/admin/register_rent_period" >Отчеты</a>|

    							</p>
    						</div>
    					</div>

    					<div class="col-md-6 widget">
    						<div class="widget-body">
    							<p class="text-right">
    								Copyright &copy; 2015</a>
    							</p>
    						</div>
    					</div>

    				</div> <!-- /row of widgets -->
    			</div>
    		</div>

    	</footer>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="/js/headroom.min.js"></script>
	<script src="/js/jQuery.headroom.min.js"></script>
	<script src="/js/template.js"></script>
</body>
</html>

