
@extends('TemplateFormulaire')

@section('formulaire')
<section id="contact" >
    <div class="container" style="margin-top: 10%;padding: 3%; background-color: white; border-radius: 10px">
        <div class="heading text-center">
            <h2><span>Inscription</span></h2>
            <div class="line"></div>
            <p><span><strong></strong></span> </p>
        </div>
        <?php if(isset($errorInscription)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorInscription; ?>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-12 ">
                <form id="" name="inscription" method="post" action="{{route('inscription')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="" for="puissance">Nom</label>
                                <?php if (isset($typedNom)) { ?>
                                    <input type="text" id="nom" name="nom" value="<?php echo $typedNom; ?>" class="form-control" <?php echo isset($invalidNom) ? 'style="border-color: red"' : ""; ?>  required="required" >
                                <?php } else { ?>
                                    <input type="text" id="nom" name="nom" placeholder="Ex: Rakotosoa Hery" class="form-control" <?php echo isset($invalidNom) ? 'style="border-color: red"' : ""; ?>  required="required" >
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="" for="puissance">Email</label>
                                <?php if (isset($typedMail)) { ?>
                                    <input type="email" name="email" value="<?php echo $typedMail; ?>" class="form-control" <?php echo isset($invalidMail) ? 'style="border-color: red"' : ""; ?>  required="required">
                                <?php } else { ?>
                                    <input type="email" name="email" placeholder="Ex: abc@example.com" class="form-control" <?php echo isset($invalidMail) ? 'style="border-color: red"' : ""; ?>  required="required">
                                <?php } ?>

                                <div id="emailHelp" class="form-text" style="text-align: start;margin-top: 4px;text-decoration-color: red"><?php echo isset($invalidMailMessage) ? $invalidMailMessage : ""; ?></div>
                            </div>
                        </div>
                    </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="" for="puissance">Numéro téléphone</label>
                                    <?php if (isset($typedTel)) { ?>
                                        <input type="tel" name="tel" id="phone" value=<?php echo $typedTel; ?> class="form-control" <?php echo isset($invalidTel) ? 'style="border-color: red"' : ""; ?>  required="required">
                                    <?php } else { ?>
                                        <input type="tel" name="tel" id="phone" placeholder="Ex: 032 13 123 45" class="form-control" <?php echo isset($invalidTel) ? 'style="border-color: red"' : ""; ?>  required="required">
                                    <?php } ?>
                                    <div id="emailHelp" class="form-text" style="text-align: start;margin-top: 4px;text-decoration: red"><i><?php echo isset($invalidTelMessage) ? $invalidTelMessage : ""; ?></i></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="" for="puissance">Mot de passe</label>
                                    <input type="password" name="mdp" class="form-control" <?php echo isset($invalidMdp) ? 'style="border-color: red"' : ""; ?>  required="required">
                                    <div id="emailHelp" class="form-text" style="text-align: start;margin-top: 4px; text-decoration-color: aliceblue"><i>Doit contenir au moins 8 caractères, un lettre en Majuscule et un chiffre.</i></div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="" for="puissance">Societé</label>
                                    <?php if (isset($typedSociete)) { ?>
                                        <input type="text" name="societe" value="<?php echo $typedSociete; ?>" class="form-control" <?php echo isset($invalidSociete) ? 'style="border-color: red"' : ""; ?>  required>
                                    <?php } else { ?>
                                        <input type="text" name="societe" placeholder="Ex: Regitech OI" class="form-control" <?php echo isset($invalidSociete) ? 'style="border-color: red"' : ""; ?>  required>
                                    <?php } ?>
                                    <div id="emailHelp" class="form-text" style="text-align: start;margin-top: 4px;text-decoration-color: red"><?php echo isset($invalidSocieteMessage) ? $invalidSocieteMessage : ""; ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="" for="puissance">Activité</label>

                                    <input type="text" name="activite" placeholder="Ex: Responsable Approvisionnement" class="form-control" <?php echo isset($invalidActivite) ? 'style="border-color: red"' : ""; ?> required >

                                    <div id="emailHelp" class="form-text" style="text-align: start;margin-top: 4px;text-decoration-color: red"><?php echo isset($invalidActiciteMessage) ? $invalidActiciteMessage : ""; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($prod['errorInscription'])){?>
                            <div class="col-md-8">
                            <h5 style="color:red;"><?php echo $prod['errorInscription']; ?></h5>
                            </div>
                        <?php } ?>
                    {{-- <a href="javascript:submitForm()" class="btn-send col-md-8 col-sm-12 col-xs-12" type="submit"> Envoyer </a>
                    --}}
                        <button type="submit" class="btn btn-success btn-sm">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
