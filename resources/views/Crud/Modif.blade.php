@extends('Crud.Template')

@section('content')
<div class="span9">
    <div class="content">
        <div class="row">
            <div class="module">
                <div class="module-head">
                    <h3>Modifier produit</h3>
                </div>
                <div class="module-body">
                    <?php foreach ($prod['produit'] as $produit) { ?>
                    <form class="form-horizontal row-fluid" action="/exeModifProduit-{{ $produit->id }}" method="POST">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Designation</label>
                            <div class="controls">
                                <input type="text" id="designation" name="designation" class="span8" value="{{ $produit->designation }}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Prix</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input type="text" id="prix" name="prix" class="span8" value="{{ $produit->prix }}"><span class="add-on">Ar</span>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Puissance</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input type="text" id="puissance" name="puissance" class="span8" value="{{ $produit->puissance }}"><span class="add-on">W</span>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Categorie</label>
                            <div class="controls">
                                <select class="span8" id="categorie" name="categorie">
                                    <option value="{{ $produit->idcategorie }}">{{ $produit->categorie }}</option>
                                    <?php foreach ($prod['categorie'] as $categorie) { ?>
                                    <option value="{{ $categorie->idcategorie }}">{{ $categorie->categorie }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Marque</label>
                            <div class="controls">
                                <select class="span8" id="marque" name="marque">
                                    <option value="{{ $produit->idmarque }}">{{ $produit->marque }}</option>
                                    <?php foreach ($prod['marque'] as $marque) { ?>
                                    <option value="{{ $marque->id }}">{{ $marque->marque }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Photo</label>
                            <div class="controls">
                                <input type="file" class="form-control" id="photo" name="photo"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Caractéristique</label>
                            <div class="controls">
                                <textarea class="span8" rows="5" id="caracteristique" name="caracteristique" >{{ $produit->caracteristique }}</textarea>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
@endsection
