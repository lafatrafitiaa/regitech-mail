@extends('Template')

@section('content')

<section id="features" style="padding: 0;">
  <div class="container">
    <div class="col-md-9 ">
      <div class="heading">
        <h2 style="text-transform:none">Demande de devis: <span><?php echo $prod['produit'][0]['designation'] ?></span></h2>
        <div class="line"></div>
        <p><span><strong></strong></span>texte concernant la demande </p>
      </div>
    </div>
      <div class="col-md-7 col-sm-6">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active feat-sec" id="tab-1">
            <form id="main-contact-form" name="contact-form" method="post" action="{{route('devisTemp',[$prod['produit'][0]['id'] ])}}">
              {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label id="labelO"for="puissance">Puissance en VA</label>
                            <input type="hidden" name="produit" value="<?php echo $prod['produit'][0]['designation'] ?>">
                            <input type="number"  name="puissance" class="form-control" min=0  value="15000" required="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label id="labelO"for="rq">Materiel à protéger</label>
                          <input type="text" name="materiel" id="rq" class="form-control" value="ordinateur" required >
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label id="labelO"for="exampleFormControlSelect2">Frequence</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                  <option>basse</option>
                                  <option>haute</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label id="labelO"for="exampleFormControlSelect2">Phase</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Monophase</option>
                                  <option>Triphase</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label id="labelO"for="exampleFormControlSelect2">Quantite</label>
                            <input type="number"  name="nbcommande" class="form-control" min=1  value="1" required="">
                        </div>
                    </div>
                </div>
                  <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label id="labelO"for="rq">Remarques</label>
                            <textarea name="remarques" id="rq" class="form-control" rows="4" placeholder="Vos remarques" ></textarea>
                          </div>
                        </div>
                  </div>
                  <a class="btn-send col-md-6 " href="#tab-2" id="btn-valider" data-toggle="tab">Suivant</a>
              </div>
              <div role="tabpanel" class="tab-pane" id="tab-2">
                      <div class="row">
                          <div class="col-sm-6" style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Nom <span style="color:red;">*</span></label>
                                <input type="text"  name="nomClient" class="form-control" required="">
                            </div>
                          </div>
                          <div class="col-sm-6"  style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Email <span style="color:red;">*</span></label>
                                <input type="email"  name="emailClient" class="form-control" required="">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6" style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Société <span style="color:red;"></span></label>
                                <input type="text"  name="societe" class="form-control" required="">
                            </div>
                          </div>
                          <div class="col-sm-6"  style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Activité <span style="color:red;"></span></label>
                                <input type="text"  name="activite" class="form-control" required="">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6" style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Tel <span style="color:red;">*</span></label>
                                <input type="text"  name="tel" class="form-control" placeholder="034 04 204 00" required="">
                            </div>
                          </div>
                          <div class="col-md-6"  style="height:3.5em;">
                            <div class="form-group">
                                <label id="labelO" for="puissance">Poste <span style="color:red;"></span></label>
                                <input type="text"  name="poste" class="form-control" required="">
                            </div>
                          </div>
                      </div>
                      <button class="btn-send col-md-10 col-sm-12 col-xs-12"type="submit" id="btn-valider">Envoyer</button>
                </div>
            </form>
        </div>
    </div>

    </div>
</section>

@endsection
