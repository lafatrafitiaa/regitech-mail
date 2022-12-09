@extends('Crud.Template')

@section('content')
<div class="span9">
    <div class="content">
        <?php foreach($prod['produit'] as $produit){ ?>
            <div class="col-md-4  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="col-md-5">
                    <h1 style="margin-left: 20%">
                        {{$produit->designation}}
                        <a type="button" style="color: green" class="btn btn-outline-primary" href="/crudModifProduit-{{ $produit->id }}">Modifier</a>
                        <a type="button" style="color: red" class="btn btn-outline-danger" href="/deleteProduit-{{ $produit->id }}">Supprimer</a>
                    </h1>
                </div>
                <img src="{{asset($produit->photo)}}" class="detailPhoto" alt="" style="margin-left: 20%">
            </div>
            <div class="col-md-12">
                <table class="table table-borderless">
                    <tr>
                      <td><h4>Modele</h4></td>
                      <td><h4>{{$produit->modele}}</h4> </td>
                    </tr>
                    <tr>
                      <td><h4>Categorie</h4></td>
                      <td><h4>{{$produit->categorie}}</h4> </td>
                    </tr>
                    <?php if($produit->puissance>0){ ?>
                      <tr>
                        <td><h4>Puissance</h4></td>
                        <td><h4>{{$produit->puissance}} VA</h4> </td>
                      </tr>
                    <?php } ?>
                    <?php if($produit->prix>0){ ?>
                      <tr>
                        <td><h4>Prix</h4></td>
                        <td><h4>{{$produit->prix}} Ar</h4> </td>
                      </tr>
                    <?php } ?>

                    <tr>
                      <td><h4>Marque</h4></td>
                      <td><h4>{{$produit->marque}}</h4> </td>
                    </tr>
                    <?php if(isset($produit->caracteristique)){ ?>
                      <tr>
                        <td><h4>Description</h4></td>
                        <td><h4>{{$produit->caracteristique}} </h4> </td>
                      </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <br>
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

</div>

@endsection
