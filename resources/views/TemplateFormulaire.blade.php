<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="">
<meta name="description" content="Regitech Océan Indien: vente, service après vente et réparation dans le domaine de la protéction électrique, bureautique, informatique et grand format situé à Madagascar depuis 2013.">
<meta name="keywords" content="">
<title>Regitech - Compte </title>
<!--Bootstrap-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<!--Responsive-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
<!--Animation-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
<!--Prettyphoto-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prettyPhoto.css')}}">
<!--Font-Awesome-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
<!--Owl-Slider-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.transitions.css')}}">
</head>

<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
    <!--Preloader-->
    <div id="preloader">
        <div id="pre-status">
            <div class="preload-placeholder"></div>
        </div>
    </div>
    <!--Navigation-->
    <header id="menu">
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{route('/')}}"><img id="logo" src="{{asset('assets/images/Logo/logoR.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    @yield('formulaire')

    <footer id="footer-down">
        <p> &copy; Copyright 2022 REGITECH</p>
    </footer>
</body>
</html>


<!--Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
<!--Boostrap-Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.js')}}"></script>
<!--Preetyphoto-Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.prettyPhoto.js')}}"></script>
<!--NiceScroll-Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.nicescroll.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoints.min.js')}}"></script>
<!--Isotopes-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.isotope.js')}}"></script>
<!--Wow-Jquery-->
<script type="text/javascript" src="{{ asset('assets/js/wow.js')}}"></script>
<!--Count-Jquey-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.inview.min.js')}}"></script>
<!--Owl-Crousels-Jqury-->
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.js')}}"></script>
<!--Main-Scripts-->
<script type="text/javascript" src="{{ asset('assets/js/script.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cart.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/navbarSearch.js')}}"></script>

<script type="text/javascript">
function submitForm(){
  document.toCart.submit();
}
</script>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>


