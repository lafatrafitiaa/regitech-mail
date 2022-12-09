<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Regitech - Admin</title>
	<link type="text/css" href="{{asset('assets2/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('assets2/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('assets2/css/theme.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('images/icons/css/font-awesome.css')}}" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>
                <a class="navbar-brand" href="{{route('/')}}"><img id="logo" src="{{asset('assets/images/Logo/logoR.png')}}" alt=""></a>
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">
						<ul class="widget widget-menu unstyled">
                            <li><a href="listeProduit">Liste des produits </a></li>
                        </ul>
                        <ul class="widget widget-menu unstyled">
                            <li><a href="crudAjout"> Ajout produit </a></li>
                        </ul>
                        <ul class="widget widget-menu unstyled">
                            <li><a href="logout">Se déconnecter </a></li>
                        </ul>
					</div>
				</div>

				<div class="span9">
					<div class="content">
                        @yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="{{asset('assets2/scripts/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets2/scripts/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets2/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets2/scripts/flot/jquery.flot.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets2/scripts/datatables/jquery.dataTables.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
