<?php
    $role = Session::get('role');
    $tel = Session::get('tel');
    $mail = Session::get('mail');
    $soc = Session::get('soc');
    $nom = Session::get('nom');
    $activite = Session::get('activite');
?>


@extends('Template')

@section('content')
    <section id="blog" style="padding:0" >
        <div class="container">
            <div class="col-md-12" style="float:left">
                <table class="table table-bordereless">
                    <thead>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{route('deleteCart')}}">
                                <button class="clear-cart btn btn-danger"> <i class="fa fa-trash"  data-toggle="tooltip" data-placement="left" title="Vider votre panier"></i> </button>
                            </a>
                        </td>
                    </thead>
                    <tr>
                        <td>Photo</td>
                        <td>Designation</td>
                        <td>Quantité</td>
                        <td>Prix unitaire</td>
                        <td>Action</td>
                        <td></td>
                    </tr>
                    <tbody>
                        <?php
                            $total=0;
                            if(isset($prod['panier'])){
                            foreach($prod['panier'] as $produit){
                                $photo="";
                                $designation="";
                                $quantite=$produit[0]['quantite'];
                                $prix=$produit[0]['prix'];
                                $total=$total+($prix*$quantite);
                            ?>
                            <tr>
                                <td>
                                    <img style="max-width:75px;" src="{{asset($produit[0]['photo'])}}" alt="">
                                </td>
                                <td><?php echo $produit[0]['designation'];?></td>
                                <td><?php echo $produit[0]['quantite'];?></td>
                                <td><?php echo number_format($produit[0]['prix']);?></td>
                                <td style="width:75px;"><a href="{{route('editCart',[$produit[0]['id']])}}"> <i id="edit" class="fa fa-edit"></i></a></td>
                                <td style="width:75px;"><a href="{{route('removeFromCart',[$produit[0]['id']])}}"><i id="remove" class="fa fa-remove"></i></a></td>
                            </tr>
                        <?php } } ?>
                        <tr>
                        <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total:</td>
                            <td>
                            <!-- {{$total}} -->
                                <?php
                                echo number_format($total);
                                ?> Ar
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active feat-sec" id="tab-1">
                    <a class="btn-valider" style="left:85%" href="#tab-2" data-toggle="tab">Valider</a>
                </div>
                <div role="tabpanel" class="tab-pane feat-sec" id="tab-2">
                    <form action="{{route('/validerCommande')}}" name="validerCommande" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6" style="padding:0 0 0 5%;">
                            <div class="row" style="padding:8px;">
                                <div class="col-sm-12 col-md-4">
                                    <h5>Société<span style="color:red;"></span> :</h4>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <?php if($role == null) { ?>
                                        <input type="text" class="form-control" placeholder="Nom de la société" name="societe">
                                    <?php } else { ?>
                                        <input type="text" class="form-control" placeholder="Nom de la société" name="societe" value="{{ $soc }}">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row" style="padding:8px;">
                                <div class="col-sm-12 col-md-4">
                                    <h5>Nom <span style="color:red;">*</span> :</h4>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <?php if($role == null){ ?>
                                        <input type="text" class="form-control" placeholder="Votre nom" name="nomClient"  required="" >
                                    <?php } else { ?>
                                        <input type="text" class="form-control" placeholder="Votre nom" name="nomClient"  required="" value="{{ $nom }}">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row" style="padding:8px;">
                                <div class="col-sm-12 col-md-4">
                                    <h5>Email <span style="color:red;">*</span> :</h4>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <?php if($role == null) { ?>
                                        <input type="email" class="form-control" placeholder="Votre email" name="emailClient"  required="" >
                                    <?php } else { ?>
                                        <input type="email" class="form-control" placeholder="Votre email" name="emailClient"  required="" value="{{ $mail }}">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" style="padding:0 0 0 5%;">
                            <div class="row" style="padding:8px;">
                                <div class="col-sm-10 col-md-4">
                                    <h5>Activité <span style="color:red;"></span> :</h4>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <?php if($role == null) { ?>
                                        <input type="text" class="form-control" placeholder="Activité de la société" name="activite" >
                                    <?php } else { ?>
                                        <input type="text" class="form-control" placeholder="Activité de la société" name="activite" value="{{ $activite }}">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row" style="padding:8px;">
                                <div class="col-sm-10 col-md-4">
                                <h5>Poste <span style="color:red;"></span> :</h4>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" class="form-control" placeholder="Votre poste" name="poste" >
                                </div>
                            </div>
                            <div class="row" style="padding:8px;">
                                <div class="col-sm-10 col-md-4">
                                    <h5>Tel <span style="color:red;">*</span> :</h4>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <?php if($role == null) { ?>
                                        <input type="text" class="form-control" placeholder="034 00 004 02" name="tel"  required="" >
                                    <?php } else { ?>
                                        <input type="text" class="form-control" placeholder="034 00 004 02" name="tel"  required="" value="{{ $tel }}">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @if($total!=0)
                            <button id="btn-valider" type="submit" style="top:2em;left:4%">Valider Commande</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<!--Client-Section-Start-->
<div id="client">
  <div class="container">
    <div id="client-slider" class="owl-carousel">
      <?php foreach($prod['marques'] as $marque){  ?>
        <div class="item client-logo"> <a ><img src="{{asset($marque->photo)}}" class="img-responsive" alt=""/></a> </div>
      <?php } ?>
    </div>
  </div>
</div>
@endsection
