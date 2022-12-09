<!DOCTYPE html>
<html>
<head>
    <title>Demande Devis</title>
</head>
<body>
    <div style="border-block-color: black; text-align: center">
        <img src="{{asset('assets/images/logo/logoR.png')}}"  alt="">
        <p>Bonjour Regitech OI,</p>
        <p>Voici donc les propos de ma demande chez vous.</p>

        {{-- <h3>Client: {{ $details['client'] }}</h3> --}}
        <p>Produit: <strong>{{ $details['subject'] }}</strong></p>
    {{--
        <?php if ($details['email']!=""){  ?>
            <p>email: {{ $details['email']}}</p>
        <?php } ?>
        <?php if ($details['tel']!=""){  ?>
            <p>téléphone: {{ $details['tel']}}</p>
        <?php } ?>
        <?php if ($details['societe']!=""){  ?>
            <p>societe: {{ $details['societe']}}</p>
        <?php } ?> --}}

        {{-- <?php if ($details['activite']!=""){  ?>
            <p>activité : {{$details['activite']}} </p>
        <?php } ?>
        <?php if ($details['poste']!=""){  ?>
            <p>poste : {{$details['poste']}} </p>
        <?php } ?> --}}
        <?php if ($details['description']!=""){ ?>
            <p>Description : {{$details['description']}}</p>
        <?php } ?>

        <?php if(isset($details['tabProduit'])){ ?>
            <table style="border: black; border-style: solid;">
                    <tr style="border 1px solid black;">
                    <td>Designation</td>
                    <td>Prix unitaire</td>
                    <td>quantite</td>
                </tr>
                <?php   foreach($details['tabProduit'] as $produit){ ?>
                    <tr style="border 1px solid black;">
                        <td><?php echo $produit[0]['designation'];?></td>
                        <td><?php echo $produit[0]['prix'];?></td>
                        <td><?php echo $produit[0]['quantite'];?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>

        <p>Cordialement,</p>
        <p>__________________</p>
        <p>{{ $details['societe']}}, {{ $details['activite']}}</p>
        <p>{{ $details['email']}}, {{ $details['tel']}}, {{$details['poste']}}</p>
    </div>
</body>
</html>
