<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/sidebar.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="{{ asset('/css/jquery-ui-1.10.0.custom.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.1/css/select2.min.css" rel="stylesheet" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>


<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Library</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ (Request::segment(1) == 'biblios') ? 'active' : '' }}"><a href="{{route('biblios.index')}}">Cataloging</a></li>
                <li class="{{ (Request::segment(1) == 'circ') ? 'active' : '' }}"><a href="{{url('circ')}}">Circulation</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="row">
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <!-- <div class="absolute-wrapper"> </div> -->
    <!-- Menu -->
    <div class="side-menu">

        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="brand-wrapper">
                    <!-- Hamburger -->
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!--
                    <div class="brand-name-wrapper">
                        <a class="navbar-brand" href="#">
                            Library
                        </a>
                    </div>


                    <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>


                    <div id="search" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form class="navbar-form" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                            </form>
                        </div>
                    </div>

                    -->
                </div>

            </div>

            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">
                    @yield('nav')
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="side-body">
          @yield('content')
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="{{url('/js/validator.js')}}"></script>
<script src="{{url('/js/sidebar.js')}}"></script>
<script src="{{ asset('/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.1/js/select2.min.js"></script>
@yield('scripts')
</body>
</html>
