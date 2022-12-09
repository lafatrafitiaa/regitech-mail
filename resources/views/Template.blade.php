<?php
  $role = Session::get('id');
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<?php $modele=""; if(isset($prod['active'])){ foreach($prod['modele'] as $m){ if($prod['active']==$m->id){ $modele=$m->modele; } } } ?>

<title>Regitech Océan Indien - Vente -  {{$modele}}</title>
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

    .question{
        background-color: transparent;
        border-color: #082032;
        color: #082032;
        border-radius: 20px;
        font-size: smaller;
        }

        .chatbtn{
            border-radius: 50%;
        }

</style>

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
                        class="ion-ios-search-strong"><span>Search</span></i>
                    </button>
                </form>
            </div>
        </div>
        <a href="{{route('etatCart')}}" id="cartt" >
            <span class="fa-stack fa-2x has-badge" style="font-size:1em;" data-count="<?php if(Session::get('idP')!=null){ echo count(Session::get('idP')); } ?>">
                <img src="{{asset('assets/images/logo/basket.png')}}" alt="">
            </span>
        </a>
    </div>

    <div id="container" style="margin-top:-2em;">
        <nav >
            <ul>
                <li>
                    <a href="{{route('/')}}" class="menu">Accueil</a>
                </li>
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
                        </a>
                        <ul>
                        <?php foreach($prod['categorie'] as $menu){
                        if($mod->id==$menu->idmodele){ ?>
                            <li>
                                <a href="{{route('/categorie',[$menu->idcategorie])}}"><?php echo $menu->categorie; ?></a>
                            </li>
                        <?php } } ?>
                        </ul>
                <?php } else{?>
                    <a href="{{route('/categ',[$mod->id])}}" class="menu" id="<?php echo $active ?>">
                    {{$mod->modele}}
                    </a>
                <?php } ?>
                </li>
                <?php } ?>

                <?php if ($role == null) { ?>
                    <li><a class="scroll" href="/espace-client">Se connecter</a></li>
                <?php } else { ?>
                    <li><a class="scroll" href="/logout">Se déconnecter</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>


    @yield('content')

    <footer id="footer-down">
        <h2>Suivez-nous sur</h2>
        <ul class="social-icon">
            <li class="facebook hvr-pulse"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
            <li class="whatsapp hvr-pulse"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
        </ul>

        <p> &copy; Copyright 2022 REGITECH </p>
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

                        <div class="input-group">
                            <form action="ajoutMessage" method="post">
                                @csrf
                                <input type="hidden" name="idclientssent" value="{{ $role }}">
                                <input id="btn-input" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here...">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </form>

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
<script type="text/javascript" src="{{ asset('assets/js/cart.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/navbarSearch.js')}}"></script>

<script type="text/javascript">
function submitForm(){
      document.toCart.submit();
}
</script>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>

<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
            title : '<h5>Jaona@gmail.com (033 33 333 33)</h5>',

            html: true,
            content: function(){
                return $('#popover-form').html();
            }
        });
    });
</script>

<script type="text/javascript">
function submitForm(){
        document.validerCommande.submit();
    }
</script>

{{-- chat box --}}
{{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
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
