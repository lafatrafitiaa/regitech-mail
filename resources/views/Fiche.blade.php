@extends('Template')

@section('content')
    <div class="container">
        <div class="experience">
            <?php foreach($prod['produit'] as $produit){ ?>
                <div class="col-md-4  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="col-md-12">
                        <h1>{{$produit->designation}}</h1>
                    </div>
                    <img src="{{asset($produit->photo)}}" class="detailPhoto" alt="" width="300px" height="300px">
                    <?php if($produit->prix>0){?>
                        <div class="col-md-12">
                        <?php if(isset($prod['quantite'])) { }else{?>
                          <a class="btn-order" style="margin-left:3em;" href="{{route('addCart',[$produit->id])}}"  id="addCart">Ajouter panier</a>
                        <?php } ?>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-12" >
                            <a class="btn-order" style="margin-left:3em;" href="{{route('devisProduit',[$produit->id])}}">Demander devis</a>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                          <td><h6>Modele</h6></td>
                          <td><h5>{{$produit->modele}}</h5> </td>
                        </tr>
                        <tr>
                          <td><h6>Categorie</h6></td>
                          <td><h5>{{$produit->categorie}}</h5> </td>
                        </tr>
                        <?php if($produit->puissance>0){ ?>
                          <tr>
                            <td><h6>Puissance</h6></td>
                            <td><h5>{{$produit->puissance}} VA</h5> </td>
                          </tr>
                        <?php } ?>
                        <?php if($produit->prix>0){ ?>
                          <tr>
                            <td><h6>Prix</h6></td>
                            <td><h5>{{$produit->prix}} Ar</h5> </td>
                          </tr>
                        <?php } ?>

                        <tr>
                          <td><h6>Marque</h6></td>
                          <td><h5>{{$produit->marque}}</h5> </td>
                        </tr>
                        <?php if(isset($produit->caracteristique)){ ?>
                          <tr>
                            <td><h6>Description</h6></td>
                            <td><h5>{{$produit->caracteristique}} </h5> </td>
                          </tr>
                        <?php } ?>

                    </table>
                    <?php if(isset($prod['quantite'])) {?>
                        <div class="row">
                        <form id="main-contact-form" name="ajoutQtite" method="post" action="{{route('modifPanier',[$prod['idProduit'] ])}}">
                            {{ csrf_field() }}

                          <table class="table table-borderless">
                              <tr>
                                  <th style="width:35%;">Quantité à ajouter:</th>
                                  <th style="width:20%;"><input type="number" id="quantite" name="quantite" class="form-control" min=1  value="<?php echo $prod['quantite']; ?>" required=""></th>
                                 <th > <a class="btn-order" style="padding: 3% 11%;top:0;" href="javascript:submitForm()" id="addCart" >Valider</a> </th>
                              </tr>
                          </table>
                        </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-11">
                <?php if($produit->fiche!=null){ ?>
                <div id="wrapper">
                    <div class="scrollbar" id="style-2">
                        <div class="force-overflow">@include($produit->fiche) </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
@endsection
