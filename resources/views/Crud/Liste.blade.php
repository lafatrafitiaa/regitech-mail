@extends('Crud.Template')

@section('content')

<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>DataTables</h3>
            </div>
            <div class="module-body table">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                    <thead>
                        <tr>
                            <th>Designation</th>
                            <th>Categorie</th>
                            <th>Marque</th>
                            <th>Prix</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($liste['produit'] as $produit) { ?>
                        <tr class="odd gradeX">
                            <td> <a href="crudProduit-{{ $produit->id }}">{{ $produit->designation }}</a></td>
                            <td>{{ $produit->categorie }}</td>
                            <td>{{ $produit->marque }}</td>
                            <td>{{ $produit->prix }}</td>
                            <td class="center"> <img src="{{asset($produit->photo)}}" class="img-responsive" alt="" width="50px" height="50px"> </td>
                            <td style="width:75px;">
                                <a href="/crudModifProduit-{{ $produit->id }}"><i id="edit" class="fa fa-edit"></i></a>  |  <a href="/deleteProduit-{{ $produit->id }}"><i id="remove" class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    <br />
    </div>
</div>
@endsection
