<?php
    $role = Session::get('role');
?>
@extends('Crud.Template')

@section('content')
<div class="span9">
    <div class="content">
        <div class="row">
            <div class="module">
                <div class="module-head">
                    <h3>Ajouter produit </h3>
                </div>
                <div class="module-body">
                    <form class="form-horizontal row-fluid" action="exeCrudAjout" method="POST">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Designation</label>
                            <div class="controls">
                                <input type="text" id="designation" name="designation" class="span8">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Prix</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input type="text" id="prix" name="prix" class="span8"><span class="add-on">Ar</span>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Puissance</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input type="text" id="puissance" name="puissance" class="span8"><span class="add-on">W</span>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Categorie</label>
                            <div class="controls">
                                <select class="span8" id="categorie" name="categorie">
                                    <?php foreach ($choix['categorie'] as $categorie) { ?>
                                    <option value="{{ $categorie->idcategorie }}">{{ $categorie->categorie }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Marque</label>
                            <div class="controls">
                                <select class="span8" id="marque" name="marque">
                                    <?php foreach ($choix['marque'] as $marque) { ?>
                                    <option value="{{ $marque->id }}">{{ $marque->marque }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Photo</label>
                            <div class="controls">
                                <input type="file" class="form-control" id="photo" name="photo" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Caractéristique</label>
                            <div class="controls">
                                <textarea class="span8" rows="5" id="caracteristique" name="caracteristique"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Fiche</label>
                            <div class="controls">
                                <input type="file" class="form-control" id="fiche" name="fiche" />
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-primary" type="submit">Button</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
