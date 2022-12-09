@extends('Template')

@section('content')
    <!--Team-Section-Start-->
    <section id="team" style="padding:0;">
        <div class="container" >

            <div class="row">
                <div class="col-md-8">
                    <?php if(isset($prod['activemodele'])){?>
                        <h4 style="text-transform:none;float:left"><?php echo $prod['activemodele'] ?><?php if(isset($prod['activecategorie'])){?> : <span><strong><?php echo $prod['activecategorie'];}?></strong></span></h4>
                      <?php } else{ ?>
                        <h4 style="text-transform:none;float:left"><span><strong></strong></span>Produits</h4>
                      <?php } ?>
                    </div>
            </div>
            <div class="row" >
                <?php foreach($prod['produit'] as $produit){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec wow slideInUp"  data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="team-sec" style="max-height:98%;">
                        <div class="team-img">
                            <a href="{{route('detailProduit',[$produit->id])}}">
                                <img src="{{asset($produit->photo)}}" class="img-responsive" alt="">
                            </a>
                            <div class="team-desc">
                                <h5>{{$produit->designation}}</h5>
                                <?php if($produit->prix>0){?>
                                    <p>{{number_format($produit->prix)}} Ar
                                        <?php if($produit->idcategorie == 1){ ?>
                                            TTC
                                        <?php } ?>
                                    </p>
                                <?php } else{ ?>
                                    <p>{{$produit->marque}} </p>
                                <?php } ?>
                                <ul class="pricing">
                                <?php if($produit->prix>0){?>
                                        <a class="btn-order"  href="{{route('addCart',[$produit->id])}}" id="addCart">Ajouter panier</a>
                                <?php }else{ ?>
                                    {{-- <a class="btn-order" href="{{route('/devisInfo',[$produit->id])}}">Demander devis</a> --}}
                                    <a class="btn-order" href="{{route('devisProduit',[$produit->id])}}">Demander devis</a>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
@endsection
