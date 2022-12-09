<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>REGITECH</title>
<!--Bootstrap-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nav1.css')}}"> -->


<!--Responsive-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
<!--Animation-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/fiche.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/searchCategory.css')}}">

<!--Responsive-->
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
                    <a href="{{route('/categ',[$mod->id])}}" class="menu" id="<?php echo $active ?>">
                      {{$mod->modele}}
                      <!-- <svg style="color:white;" class="icon" width="14" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M151.5 347.8L3.5 201c-4.7-4.7-4.7-12.3 0-17l19.8-19.8c4.7-4.7 12.3-4.7 17 0L160 282.7l119.7-118.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17l-148 146.8c-4.7 4.7-12.3 4.7-17 0z"/></svg> -->

                    </a>
                  <?php } ?>
                <!-- First Tier Drop Down -->

                </li>
            <?php } ?>

            <li><a href="{{route('contact')}}" class="menu">Contact</a></li>
        </ul>
    </nav>
 </div>
 <section id="features" style="padding:0">
  <div class="container">
      <div class="col-md-12">
          <div class="heading">
            <h2 style="text-transform:none">Demande de devis: <span> <?php echo $prod['produit'][0]['designation'] ?></span></h2>
            <!-- <div class="line"></div> -->
            <p><span><strong></strong></span>texte concernant la demande </p>
          </div>
      </div>
      <form action="{{route('sendDevisGf', [$prod['produit'][0]['id']])}}" name="sendDevis" method="post">
          {{ csrf_field() }}
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active feat-sec" id="tab-1">
                  <div class="col-md-6 " style="padding:0 0 0 5%;">
                      <div class="row" style="padding:8px;">
                         <div class="col-sm-12 col-md-3">
                              <h5>Société<span style="color:red;"></span> : </h4>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <input type="hidden" name="produit" value="<?php echo $prod['produit'][0]['designation'] ?>">
                            <input type="text" class="form-control" placeholder="Nom de la société" name="societe">
                          </div>
                      </div>
                      <div class="row" style="padding:8px;">
                          <div class="col-sm-12 col-md-3">
                            <h5>Nom <span style="color:red;">*</span> :</h4>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control" placeholder="Votre nom" name="nomClient"  required="" >
                          </div>
                      </div>
                      <div class="row" style="padding:8px;">
                          <div class="col-sm-12 col-md-3">
                            <h5>Email <span style="color:red;">*</span> :</h4>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <input type="email" class="form-control" placeholder="Votre email" name="emailClient"  required="" >
                          </div>
                      </div>
                      <div class="row" style="padding:8px;">
                        <div class="col-sm-12 col-md-3">
                          <h5>Quantite <span style="color:red;">*</span> :</h4>
                        </div>
                        <div class="col-sm-12 col-md-8">
                          <input type="number" class="form-control" name="nbcommande" min=1  value="1" required="" >
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6" style="padding:0 0 0 5%;">
                      <div class="row" style="padding:8px;">
                          <div class="col-sm-10 col-md-3">
                          <h5>Activité <span style="color:red;"></span> :</h4>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control" placeholder="Activité de la société" name="activite" >
                          </div>
                      </div>
                      <div class="row" style="padding:8px;">
                          <div class="col-sm-10 col-md-3">
                          <h5>Poste <span style="color:red;"></span> :</h4>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control" placeholder="Votre poste" name="poste" >
                          </div>
                      </div>
                      <div class="row" style="padding:8px;">
                          <div class="col-sm-10 col-md-3">
                            <h5>Tel <span style="color:red;">*</span> :</h4>
                          </div>
                          <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control" placeholder="034 00 004 02" name="tel"  required="" >
                          </div>
                      </div>
                  </div>

                  <div class="col-sm-4" style="float:right;">
                      <!-- <a href="#tab-2" role="tab" data-toggle="tab"  data-placement="top" title="Protéction électrique" style="color:black;">Next<i class="fa fa-flash"></i></a> -->

                    <div class="button-effect">
                      <a class="effect effect-1" href="#tab-2" data-toggle="tab" >Suivant</a>
                    </div>
                  </div>
              </div>
              <div role="tabpanel" class="tab-pane  feat-sec" id="tab-2">
                  <div class="col-md-10"><h3 style="color:grey;">Vos besoins</h3></div>
                  <div class="row">
                      <div class="col-md-5">
                          <table class="table table-borderless">
                              <thead>
                                <tr>
                                  <th scope="col" width="150 px"><h5><b>Imprimante</b>-Impression</h5></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="col" width="150 px">
                                    <label id="check" class="pure-material-checkbox">
                                      <input type="checkbox"  name="impression" value="NB">
                                      <span id="spanCheck">N/B</span>
                                    </label>
                                  </th>
                                </tr>
                                <tr>
                                  <th scope="col" width="150 px">
                                    <label id="check" class="pure-material-checkbox">
                                      <input type="checkbox"  name="impression" value="NB & Couleur">
                                      <span id="spanCheck">N/B & Couleur</span>
                                    </label>
                                  </th>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="col-md-5">
                        <table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col" width="150 px"><h5>Format</h5></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="col" width="150 px">
                                        <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="formatImpression" value="A4">
                                          <span id="spanCheck">A4</span>
                                        </label>
                                      </th>
                                  </tr>
                                  <tr>
                                      <th scope="row">
                                        <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="formatImpression" value="A4/A3">
                                          <span id="spanCheck">A4/A3</span>
                                        </label>
                                      </th>
                                  </tr>
                                </tbody>
                            </table>
                      </div>
                  </div>
                  <hr class="hr-13">
                  <div class="row">
                      <div class="col-md-5">
                            <table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col"><h5>Multifonction-Photocopie,impression,scan</h5> </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="col" width="150 px">
                                        <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="photocopie" value="NB">
                                          <span id="spanCheck"> N/B</span>
                                        </label>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th scope="row">
                                        <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="photocopie" value="NB & Couleur">
                                          <span id="spanCheck">N/B & Couleur</span>
                                        </label>
                                    </th>
                                  </tr>
                                </tbody>
                            </table>
                      </div>
                      <div class="col-md-5">
                          <table class="table table-borderless">
                              <thead>
                                <tr>
                                  <th scope="col" width="150 px"><h5> Format</h5></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="col" width="150 px">
                                        <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="formatPhotocopie" value="A4">
                                          <span id="spanCheck">A4</span>
                                        </label>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="formatPhotocopie" value="A4/A3">
                                          <span id="spanCheck">A4/A3</span>
                                        </label>
                                    </th>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <hr class="hr-13">
                  <div class="row">
                      <div class="col-md-5">
                          <table class="table table-borderless">
                              <thead>
                                <tr>
                                  <th scope="col" width="150 px"><h5> Nombre d'utilisateurs</h5></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="col" width="150 px">
                                     <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="nbUser" value=" moins de 10">
                                          <span id="spanCheck">-10</span>
                                        </label>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th scope="row">
                                        <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="nbUser" vvalue="plus de 10">
                                          <span id="spanCheck">+10</span>
                                        </label>
                                    </th>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="col-md-5">
                          <table class="table table-borderless">
                              <thead>
                                <tr>
                                  <th scope="col" width="150 px"><h5>Volume de pages mensuel</h5></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="col" width="150 px">
                                      <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="volumePage" value="-5000">
                                          <span id="spanCheck">-5000</span>
                                        </label>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">
                                       <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="volumePage" value="+5000">
                                          <span id="spanCheck">+5000</span>
                                        </label>
                                    </th>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <hr class="hr-13">
                  <div class="row">
                      <div class="col-md-5">
                           <table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col" width="150 px"><h5>Compatibilité</h5></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="col" width="150 px">
                                        <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="compatibilite" value="Windows">
                                          <span id="spanCheck">Windows</span>
                                        </label>
                                      </th>
                                    </tr>
                                    <tr>
                                      <th scope="row">
                                        <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="compatibilite" value="Mac">
                                          <span id="spanCheck">Mac</span>
                                        </label>
                                      </th>
                                  </tr>
                                </tbody>
                            </table>
                      </div>
                      <div class="col-md-5">
                         <table class="table table-borderless">
                              <thead>
                                <tr>
                                  <th scope="col" width="150 px"><h5>Modalité</h5></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="col" width="150 px">
                                      <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="modalite" value="achat">
                                          <span id="spanCheck">Achat</span>
                                        </label>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th scope="row">
                                      <label id="check" class="pure-material-checkbox">
                                          <input type="checkbox" name="modalite" value="location">
                                          <span id="spanCheck">Location/Maintenance</span>
                                        </label>
                                    </th>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <hr class="hr-13">
                  <div class="row">
                      <div class="col-md-5">
                            <table class="table table-borderless">
                                  <thead>
                                    <tr>
                                      <th scope="col" width="150 px"><h5>Reprise de l'ancien machine</h5></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="col" width="150 px">
                                          <label id="check" class="pure-material-checkbox">
                                            <input type="checkbox" name="reprise" value="reprise">
                                            <span id="spanCheck">Oui</span>
                                          </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                          <label id="check" class="pure-material-checkbox">
                                            <input type="checkbox" name="reprise" value=" non reprise">
                                            <span id="spanCheck">Non</span>
                                          </label>
                                        </th>
                                    </tr>
                                  </tbody>
                              </table>
                      </div>
                      <div class="col-md-5">
                            <table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col" width="150 px"><h5>Type de matériel</h5></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                      <th scope="col" width="150 px">
                                        <label id="check" class="pure-material-checkbox">
                                            <input type="checkbox" name="typeMateriel" value="Neuf">
                                            <span id="spanCheck">Neuf</span>
                                          </label>
                                      </th>
                                  </tr>
                                  <tr>
                                      <th scope="row">
                                        <label id="check" class="pure-material-checkbox">
                                            <input type="checkbox" name="typeMateriel" value="Occasion">
                                            <span id="spanCheck">Occasion</span>
                                          </label>
                                      </th>
                                  </tr>
                                </tbody>
                            </table>
                      </div>
                  </div>
                  <hr class="hr-13">
                  <div class="col-sm-6"></div>
                  <div class="col-sm-3" >
                          <div class="button-effect">
                          <a class="effect effect-2" href="#tab-1" data-toggle="tab" >Précédent</a>
                        </div>
                  </div>
                  <div class="col-sm-2" style="left:0">
                    <a class="btn-order" style="padding:10% 4%;" href="javascript:submitForm()" >Demander devis</a>
                  </div>
              </div>

          </div>
      </form>
  </div>
</section>


<footer id="footer">
</footer>
<footer id="footer-down">

<p> &copy; Copyright 2021 REGITECH  </p>
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
<script type="text/javascript">
function submitForm(){
      document.sendDevis.submit();
 }
</script>

<script>
    $("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});</script>

</body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->

