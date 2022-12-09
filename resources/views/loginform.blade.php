@extends('TemplateFormulaire')

@section('formulaire')
    <section id="contact" >
        <div class="container"style="padding: 5%;">
            <div class="heading">
                <h2><span>Connectez-vous</span></h2>
                <div class="line"></div>
                <p><span><strong></strong></span> </p>
            </div>
            <div class="text-center">
                <div class="col-md-12 ">
                    <form action="login" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4" style="left: 350px">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">E-Mail</label>
                                    <input type="email" name="mail" id="mail" class="form-control"  required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="left: 350px">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Mot de passe</label>
                                    <input type="password" name="mdp" id="mdp" class="form-control"  required="required">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Connection</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
