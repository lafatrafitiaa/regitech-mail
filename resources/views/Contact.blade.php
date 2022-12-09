<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>Regitech Océan Indien - Contact pour vente et service après Vente</title>
<!--Bootstrap-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/scroll.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/searchCategory.css')}}">

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
<div class="topnav">
  <a href="{{route('/')}}">
    <img src="{{asset('assets/images/logo/logoR.png')}}"  alt="">
  </a>
  
  <div class="col-md-5 col-lg-6 d-none d-lg-block" id="barS"  style="top:2em;float:right;">
      <div class="hm-form_area">
          <form action="{{ route('/recherche') }}" method="Post" class="hm-searchbox" >
          {{ csrf_field() }}

              <select class="nice-select select-search-category" name="categorie">
                  <option value="0">Toutes catégories</option>
                  <?php foreach($prod['categorie'] as $categorie){ ?>
                  <option value="<?php echo $categorie->idcategorie ?>"><?php echo $categorie->categorie ;?></option>
                  <?php } ?>
              </select>
              <input type="text" name="search" class="inputSearch" placeholder="Rechercher un produit ..." required="">
              <button type="submit" class="header-search_btn" ><i
                  class="ion-ios-search-strong"><span>Search</span></i></button>
          </form>
      </div>
  </div>
  
  <a href="{{route('etatCart')}}" id="cartt" >
    <span class="fa-stack fa-2x has-badge" style="font-size:1em;" data-count="<?php if(Session::get('idP')!=null){ echo count(Session::get('idP')); } ?>">
      <img src="{{asset('assets/images/logo/basket.png')}}" alt="">
    </span>
  </a> 
 
  <!-- <a href="{{route('espace-client')}}" id="espace"  style="text-decoration:underline black;color:black">Espace client</a> -->
</div>
<div id="container" style="margin-top:-2em;">
    <nav >
        <ul>
            <li><a href="{{route('/')}}" class="menu">Accueil</a></li>
            <?php 
               foreach($prod['modele'] as $mod){
                    if(isset($prod['active'])){
                        if($mod['id']==$prod['active']){
                            $active="active";
                        }else{
                            $active="";
                        }
                    }else{
                        $active="";
                    }
            ?>
                <li> 
                  <?php 
                    if($mod->config!=3){  
                  ?>
                        
                    <a href="#"  class="menu" id="<?php echo $active ?>">
                      {{$mod->modele}}
                      <!-- <svg style="color:white;" class="icon" width="14" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M151.5 347.8L3.5 201c-4.7-4.7-4.7-12.3 0-17l19.8-19.8c4.7-4.7 12.3-4.7 17 0L160 282.7l119.7-118.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17l-148 146.8c-4.7 4.7-12.3 4.7-17 0z"/></svg> -->

                    </a>  
                    <ul>
                      <?php foreach($prod['categorie'] as $menu){ 
                          if($mod->id==$menu->idmodele){ ?> 
                              <li><a href="{{route('/categorie',[$menu->idcategorie])}}"><?php echo $menu->categorie; ?></a></li>
                      <?php } } ?>
                    </ul>  
                  <?php } else{?>
                    <a href="{{route('/devisInfo')}}" class="menu" id="<?php echo $active ?>">
                      {{$mod->modele}}
                      <!-- <svg style="color:white;" class="icon" width="14" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M151.5 347.8L3.5 201c-4.7-4.7-4.7-12.3 0-17l19.8-19.8c4.7-4.7 12.3-4.7 17 0L160 282.7l119.7-118.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17l-148 146.8c-4.7 4.7-12.3 4.7-17 0z"/></svg> -->

                    </a>  
                  <?php } ?>
                <!-- First Tier Drop Down -->
                       
                </li>
            <?php } ?>
          
            <li><a href="{{route('contact')}}" id="active" class="menu">Contact</a></li>
        </ul>
    </nav>
 </div>

<section id="contact" class="parallex" style="margin-top:-2.28em;">
    <div class="container" id="contentContact">
        <div class="row">
            <div class="text-center" style="margin-top:-2em;">
                <div class="col-md-6 col-sm-6 contact-sec-1">
                    <ul class="contact-form">
                        <li><i class="fa fa-map-marker"></i>
                            <h6><strong>Addresse :</strong> II W 19G, Antsakaviro 101 Antananarivo Madagascar</h6>
                        </li>
                        <li><i class="fa fa-wechat"></i>
                            <h6><strong>SiteWeb :</strong> <a href="#" id="contactInfo">www.regitech-oi.com</a> </h6>
                        </li>
                    </ul>        
                </div>
                <div class="col-md-6 col-sm-6 contact-sec-1">
                    <ul class="contact-form">
                        <li><i class="fa fa-envelope"></i>
                            <h6><strong>Mail :</strong> <a href="#" id="contactInfo">Info@regitech-oi.com</a></h6>
                        </li>
                        <li><i class="fa fa-phone"></i>
                            <h6><strong>Tel :</strong> +261 321 271 000 </h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top:1em;">
            <div class="col-md-6">
                <div id="map">
                    <iframe src="https://maps.google.com/maps?q=%20Regitech%20ocean%20indien&t=&z=13&ie=UTF8&iwloc=&output=embed" style="height:338px;" width="100%"  frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="col-md-6 ">
                <form id="main-contact-form" name="contact-form" method="post" action="#">
                    <div class="row  wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nom" required="required">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="fcol-sm-6orm-group">
                                <input type="email" name="email" class="form-control" placeholder="E-mail" required="required">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Sujet" required="required">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Votre message" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                     <a class="btn-send col-md-12 col-sm-12 col-xs-12" href="#">Envoyer</a>
                </form>
            </div>
        </div>
    </div>
</section>


<footer id="footer">
  <!-- <div class="bg-sec">
    <div class="container">
      <h2>LOOKING FORWARD TO <strong>HEARING </strong>FROM YOU!</h2>
    </div>
  </div> -->
</footer>
<footer id="footer-down">
  <h2>Suivez-nous sur</h2>
  <ul class="social-icon">
    <li class="facebook hvr-pulse"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
    <li class="twitter hvr-pulse"><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li class="linkedin hvr-pulse"><a href="#"><i class="fa fa-linkedin"></i></a></li>
    <li class="google-plus hvr-pulse"><a href="#"><i class="fa fa-google-plus"></i></a></li>
    <li class="youtube hvr-pulse"><a href="#"><i class="fa fa-youtube"></i></a></li>
    <li class="instagram hvr-pulse"><a href="#"><i class="fa fa-instagram"></i></a></li>
    <li class="behance hvr-pulse"><a href="#"><i class="fa fa-behance"></i></a></li>
  </ul>
  <p> &copy; Copyright 2021 REGITECH-OI </p>
</footer>
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
<script>

</script>
</body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
