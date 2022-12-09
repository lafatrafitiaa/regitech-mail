<?php
 // $role = Session::get('role');
  $role = Session::get('id');
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="">
<meta name="description" content="Regitech Océan Indien: vente, service après vente et réparation dans le domaine de la protéction électrique, bureautique, informatique et grand format situé à Madagascar depuis 2013.">
<meta name="keywords" content="">
<title>REGITECH Océan Indien - Vente et service après vente des matériels de protection électrique, bureautique, informatique et grand format. </title>
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
<!-- Chat popover -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Chatbox -->
<link rel="stylesheet" href="{{asset('assetschat/assets/css/plugins/slider-range.css')}}" />
{{-- <link rel="stylesheet" href="{{asset('assetschat/assets/css/main17e6.css')}}" /> --}}
<link rel="stylesheet" href="{{asset('assetschat/assets/chatbot/css/style.css')}}">

</head>

<style>
  .fix-btn{
    position: fixed;
    bottom: 20px;
    right: 20px;
  }
</style>


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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{route('/')}}"><img id="logo" src="{{asset('assets/images/Logo/logoR.png')}}" alt=""></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a class="scroll" href="#menu">Accueil</a></li>
                            <li><a class="scroll" href="#service">Services</a></li>
                            <li><a class="scroll" href="#features">Produits</a></li>
                            <li><a class="scroll" href="#contact">Contact</a></li>
                            <?php if ($role == null) { ?>
                                <li><a class="scroll" href="/espace-client">Se connecter</a></li>
                            <?php } else { ?>
                                <li><a class="scroll" href="/logout">Se déconnecter</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <!--Slider-Start-->
    <section id="slider">
        <div id="home-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active" style="background-image:url('assets/images/Slider/01.jpg')">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h2><strong>Protection électrique</strong></h2>
                                <p>Onduleur</p>
                                <p style="background-color:#e73131; padding: 5px">Protégez vos appareils électriques des variations du courant ainsi que de bénéficier d'une autonomie en cas de
                                    coupure du fournisseur d'électricité local.</p>
                                <p>Stabilisateur ou régulateur de tension</p>
                                <p style="background-color:#e73131; padding: 5px">Protégez vos appareils électriques des variations du courant.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-image:url('assets/images/Slider/03.jpg')">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <h2><strong>Bureautique</strong></h2>
                                <p style="background-color:#e73131">Une gamme complète d'imprimantes, de multifonctions format A4, A3, noir et blanc adaptée à votre utilisation.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-image:url('assets/images/Slider/10.jpg')">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <h2><strong>Informatique</strong></h2>
                                <p style="background-color:#e73131">Nous pouvons fournir des matériels informatiques & NTIC de marques internationales.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item" style="background-image:url('assets/images/Slider/02.jpg')">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <h2><strong>Grand Format</strong></h2>
                                <p style="background-color:#e73131">Pour un travail de qualité et de précision, optez pour les grands formats de la gamme hp et roland.</p>
                                <p>Indoor : Hp </p>
                                <p>Outdoor : Print'tek et Roland </p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a> </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading">
                    <h2>Pourquoi <span>REGITECH OI ?</span></h2>
                    <p>Description Regitech OI</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ab-sec">
                    <div class="col-md-6">
                        <p>La société REGITECH OCEAN INDIEN a été fondée en 2013.
                            <br> Le gérant, Aldo CALIXTE, expérimenté de plus de 35 ans dans le domaine de la bureautique, électrique, ... officie à Madagascar avec des liens d'attachement très profond à la culture Malagasy.
                            <br> Elle assure la vente et le SAV des produits dans chacun de ses domaines.
                        </p>
                    </div>
                    <div class="col-md-6 ab-sec-img wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <img src="{{asset('assets/images/Aboutus/01.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-sec" >
        <div class="container">
            <div class="col-md-10 col-sm-10 col-xs-8">
                <h3>Plus qu'une référence, un leader dans son domaine</h3>
            </div>
        </div>
    </div>

    <section id="service">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading">
                    <h2>NOS <span>SERVICES</span></h2>
                    <div class="line"></div>
                    <p>Les services de Regitech</p>
                </div>
            </div>
            <div class="row">
                <div class="features-sec">
                    <div class="col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">SAV</h5>
                                <p>Nous vous proposons un service performant d'assistance et d'intervention sur les produits selon la modalité definie dans le contrat ou lors de la vente sous garantie ou hors garantie.</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-cubes"></i>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Location/Maintenance</h5>
                                <p>Nous proposons des contrats de location et de maintanance sur nos produits.</p>
                                <p>Maintenance préventive, intervention selon les thermes definie dans les contrats.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-pie-chart"></i>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Vente</h5>
                                <p>Nous vous proposons des solutions d'impressions et de copies ainsi que de la bureautique, informatique, protection électrique(Onduleur, régulateur de tension) et des solutions solaires. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Diagnostic/Réparation</h5>
                                <p>Interventions sur les photocopieurs, imprimantes,ordinateurs (portable, bureau) et appareils électriques divers.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading">
                    <h2>NOS <span>PRODUITS</span></h2>
                    <p>Text-description des produits general</p>
                </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab-1" role="tab" data-toggle="tab"  data-placement="top" title="Protéction électrique"><i class="fa fa-flash"></i></a></li>
                <li role="presentation" ><a href="#tab-2" role="tab" data-toggle="tab"  data-placement="top" title="Bureautique"><i class="fa fa-print"></i></a></li>
                <li role="presentation"><a href="#tab-3" role="tab" data-toggle="tab" data-placement="top" title="Informatique"><i class="fa fa-laptop"></i></a></li>
                <li role="presentation"><a href="#tab-4" role="tab" data-toggle="tab" data-placement="top" title="Grand format"><i class="fa fa-th-large"></i></a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active feat-sec" id="tab-1">
                    <div class="row">
                        <div class="col-md-6 tab">
                            <h5>Protéction électrique</h5>
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($prod['protection'] as $cat){ ?>
                        <div class="col-md-4 tab-img" id="division">
                            <a href="{{route('/categorie',[$cat->idcategorie])}}">
                                <img src="{{asset($cat->photocategorie)}}" class="img-responsive" alt="">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane feat-sec" id="tab-2">
                    <div class="row">
                        <div class="col-md6 tab">
                            <h5>Bureautique</h5>
                            <div class="line"></div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-6">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach($prod['bureautique'] as $cat){ ?>
                    <div class="col-md-6 tab-img" id="division">
                        <a href="{{route('/categorie',[$cat->idcategorie])}}">
                            <img src="{{asset($cat->photocategorie)}}" class="img-responsive" alt="">
                        </a>
                    </div>
                    <?php } ?>
                </div>

                <div role="tabpanel" class="tab-pane feat-sec" id="tab-3">
                    <div class="row">
                        <div class="col-md-6 tab">
                            <h5>Informatique</h5>
                            <div class="line"></div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-6">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($prod['informatique'] as $cat){ ?>
                        <div class="col-md-6 tab-img" id="division">
                            <a href="{{route('/categorie',[$cat->idcategorie])}}">
                                <img src="{{asset($cat->photocategorie)}}" class="img-responsive" alt="">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane feat-sec" id="tab-4">
                    <div class="row">
                        <div class="col-md-6 tab">
                            <h5>Grand Format</h5>
                            <div class="line"></div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-6">
                                <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach($prod['grandFormat'] as $cat){ ?>
                    <div class="col-md-6 tab-img" id="division">
                    <a href="{{route('/categorie',[$cat->idcategorie])}}">
                        <img src="{{asset($cat->photocategorie)}}" class="img-responsive" alt="">
                    </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <div id="client">
        <div class="container">
            <div id="client-slider" class="owl-carousel">
                <?php foreach($prod['marques'] as $marque){  ?>
                <div class="item client-logo">
                    <a><img src="{{asset($marque->photo)}}" class="img-responsive" alt=""/></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <section id="contact" class="parallex">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading">
                    <h2> NOUS <span>CONTACTER</span></h2>
                    <div class="line"></div>
                    <p><span><strong></strong></span></p>
                </div>
            </div>
            <div class="text-center">
                <div class="col-md-12 col-sm-6 contact-sec-1">
                    <div class="row col-md-offset-4">
                        <ul class="contact-form">
                            <li><i class="fa fa-map-marker"></i>
                                <h6><strong>Addresse :</strong> II W 19G, Antsakaviro 101 Antananarivo Madagascar</h6>
                                </li>
                            <li><i class="fa fa-envelope"></i>
                                <h6><strong>Mail :</strong> <a href="#" id="contactInfo">Contact@regitech-oi.com</a></h6>
                            </li>
                            <li><i class="fa fa-phone"></i>
                                <h6><strong>Tél. :</strong> +261 32 12 710 00 </h6>
                            </li>
                            {{-- <li><i class="fa fa-wechat"></i>
                                <h6><strong>SiteWeb :</strong> <a href="#" id="contactInfo">www.regitech-oi.com</a> </h6>
                            </li> --}}
                            <li>
                                <a href="/formulaireRendezvous" class="btn btn-success" type="button">Obtenez un rendez-vous</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer-down">
        <h2>Suivez-nous sur</h2>
        <ul class="social-icon">
            <li class="facebook hvr-pulse"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
            <li class="whatsapp hvr-pulse"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
        </ul>
        <p> &copy; Copyright 2021 REGITECH </p>
    </footer>

    <?php if ($role != null) { ?>

        <div class="hold-transition light-skin theme-primary fixed sidebar-collapse">

            <div id="chat-box-body">
                <div id="chat-circle" class="chatbtn" >
                    <img src="{{asset('assetschat/assets/imgs/c2.gif')}}" width="90px"  style="border-radius: 50%;">
                    <div id="chat-overlay"></div>
                </div>

                <div class="chat-box">
                    <div class="chat-box-header p-15 d-flex justify-content-between align-items-center" style="border-radius: 10px;">

                        <div class="text-center flex-grow-1" >
                            <!-- <button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" type="button" style="width: 40px; height: 40px;">
                                <span class="icon-Close fs-22" style="position: relative; right: 6px;"><span class="path1"></span><span class="path2"></span></span>
                            </button> -->
                            <br>

                                <svg id="chat-box-toggle" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>

                            <h4  style="color: #082032;">Discutez directement avec regitech</h4>


                        </div>
                    </div>
                    <div class="chat-box-body">
                        <div class="chat-logs" id="chat-emplacement">

                        </div>

                        <div class="row">
                        <div class="input-group">
                            <form action="ajoutMessage" method="post">
                                @csrf
                                <input type="hidden" name="idclientssent" value="{{ $role }}">

                                    <input id="btn-input" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here...">

                                    <button type="submit" class="btn btn-primary btn-sm" id="btn-chat">
                                        Send
                                    </button>



                            </form>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="fix-btn">
        <a href="autreDevis" type="button" data-placement="top" class="btn btn-lg btn-danger">
            Faire au autre devis
        </a>
    </div>


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
<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- Script chat popover -->
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
</script>



{{-- chat box --}}
<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('assetschat/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assetschat/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assetschat/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('assetschat/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/slider-range.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('assetschat/assets/js/plugins/jquery.elevatezoom.js')}}"></script>

<script src="{{asset('assetschat/assets/chatbot/js/vendors.min.js')}}"></script>
<script src="{{asset('assetschat/assets/chatbot/js/pages/chat-popup.js')}}"></script>
<script src="{{asset('assetschat/assets/chatbot/../assets/icons/feather-icons/feather.min.js')}}"></script>

<!-- Chat-Bot Admin App -->
<script src="{{asset('assetschat/assets/js/tchatBot.js')}}"></script>
<script src="{{asset('assetschat/assets/chatbot/js/template.js')}}"></script>
<script src="{{asset('assetschat/assets/chatbot/js/pages/dashboard.js')}}"></script>

<script>
    fetch('http://localhost:8000/message').then(response => response.json()).then(data => {
        let divEmplacement = document.getElementById("chat-emplacement");

        for (let i = 0; i < data.length; i++) {
            const mess = data[i];

            const divMess = document.createElement("div");
            divMess.innerHTML = mess.messages;
            divMess.classList.add("cm-msg-text");

            const divEnveloppe = document.createElement("div");
            divEnveloppe.classList.add("chat-msg");

            if(mess.idclientssent === <?php echo $role; ?>){
                divEnveloppe.classList.add("self");
            } else {
                divEnveloppe.classList.add("user");
            }
            divEnveloppe.append(divMess);

            divEmplacement.append(divEnveloppe);
        }
    });
</script>
