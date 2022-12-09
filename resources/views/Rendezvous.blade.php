<?php
    $role = Session::get('role');
    $tel = Session::get('tel');
    $mail = Session::get('mail');
    $soc = Session::get('soc');
?>

@extends('TemplateFormulaire')

@section('formulaire')

    <section id="contact" >
        <div class="container"style="padding: 5%;">
            <div class="heading">
                <h2><span>Demande de rendez-vous</span></h2>
                <div class="line"></div>
                <p><span><strong></strong></span> </p>
            </div>
            <div class="text-center">
                <div class="col-md-12 ">
                    <form action="ajoutRdv" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2" style="left: 350px">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Date</label>
                                    <input type="date" class="form-control" required="required" name="date">
                                </div>
                            </div>
                            <div class="col-md-2" style="left: 355px">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Heure</label>
                                    <input type="time" class="form-control" required="required" name="heure">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="left: 350px">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Lieu</label>
                                    <input type="text" class="form-control"  required="required" name="lieu">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="left: 350px">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Société</label>
                                    <?php if($role == null){ ?>
                                        <input type="text" class="form-control"  required="required" name="societe">
                                    <?php } else { ?>
                                        <input type="text" class="form-control"  required="required" name="societe" value="{{ $soc }}">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="left: 350px">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">Téléphone</label>
                                    <?php if($role == null){ ?>
                                        <input type="text" class="form-control"  required="required" name="tel">
                                    <?php } else { ?>
                                        <input type="text" class="form-control"  required="required" name="tel" value="{{ $tel }}">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="left: 350px">
                                <div class="form-group">
                                    <label style="color: white" for="puissance">E-Mail</label>
                                    <?php if($role==null){ ?>
                                        <input type="email" class="form-control"  required="required" name="mail">
                                    <?php } else { ?>
                                        <input type="email" class="form-control"  required="required" name="mail" value="{{ $mail }}">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="left: 350px">
                                <label style="color: white" for="puissance">Motif</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="motif"></textarea>
                              </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success btn-sm">Connection</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
