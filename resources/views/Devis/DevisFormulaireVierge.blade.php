@extends('Template')

@section('content')

<section style="padding: 0;">
    <div class="container">
        <div class="col-md-9 ">
            <div class="heading">
                <h2 style="text-transform:none">Demande de devis pour  <span>un tout autre produit</span></h2>
                <div class="line"></div>
                <p><span><strong></strong></span>texte concernant la demande </p>
            </div>
        </div>
           <div class="col-md-10"  >
                <form id="main-contact-form" name="contact-form" method="post" action="sendAutreDevis">
                {{ csrf_field() }}
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label id="labelO"for="rq">Remarques</label>
                            <textarea name="remarques" id="rq" class="form-control" rows="4" placeholder="Vos remarques" required></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn-send col-md-10 col-sm-12 col-xs-12"type="submit" id="btn-valider">Envoyer</button>
                </form>
            </div>

    </div>
</section>

@endsection
