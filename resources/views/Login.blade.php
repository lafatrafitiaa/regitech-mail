<?php
    $mail = isset($email) ? $email : "";
    $gotError = isset($errorType);
    $errorMsg = '';
    $errorSignal = "";
    if (isset($_GET['errorType'])){
        $gotError = true;
        $errorT = $_GET['errorType'];
        // dd($_GET);
        if($errorT === "logfirst"){
            $errorMsg = "Veuillez d'abord vous connecter.";
            $errorSignal = "warning";
        }
    }
    if (isset($errorType)) {
        $errorMsg = $errorMessage;
        $errorSignal = $errorSign;
    }
    // dd($errorMsg, $errorSignal);
?>
@extends('TemplateFormulaire')

@section('formulaire')
    <section id="contact" >
        <div class="container" style="margin-top: 5%;padding: 0%; background-color: white; border-radius: 10px">
            <div class="heading">
                <h2><span>Connectez-vous</span></h2>
                <div class="line"></div>
                <p><span><strong></strong></span> </p>
            </div>
            <?php if($gotError) { ?>
                <div class="alert alert-<?php echo $errorSignal; ?>" role="alert">
                    <?php echo $errorMsg; ?>
                </div>
            <?php } ?>
            <div class="text-center">
                <div class="col-md-12 ">
                    <form action="login" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4" style="left: 350px">
                                <div class="form-group">
                                    <label style="color: black" for="puissance">E-Mail</label>
                                    <input type="email" name="mail" id="mail" class="form-control" value="<?php echo $mail; ?>"  required="required">
                                    {{-- <div id="emailHelp" class="form-text text-white">Veuillez remplir ce champs.</div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="left: 350px">
                                <div class="form-group">
                                    <label style="color: black" for="puissance">Mot de passe</label>
                                    <input type="password" name="mdp" id="mdp" class="form-control"  required="required">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Connection</button>
                    </form>

                    <h3><a href="vos-renseignements">Inscrivez-vous</a></h3>
                </div>
            </div>
        </div>
    </section>
@endsection
