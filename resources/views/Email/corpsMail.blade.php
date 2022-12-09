<!DOCTYPE html>
<html>
<head>
    <title>Demande Devis</title>
</head>
<body>

    <div style="background-color: grey">
        <img src="{{asset('assets/images/logo/logoR.png')}}"  alt="">
        <p>Bonjour, </p>
        <p>Voici les propos de ma demande de devis, espérant une retour de votre part.</p>

        {{-- <h3>Client: {{ $details['client'] }}</h3> --}}
        <p>Demande devis sur:{{ $details['subject'] }}</p>

        <?php if ($details['produit']!=""){ ?>
            <p>Produit demandé : <strong>{{$details['produit']}}</strong> </p>
        <?php } ?>

        <?php if ($details['modele']!=""){ ?>
        <p>Modele: {{ $details['modele']}}</p>
        <?php } ?>
        <?php if ($details['puissance']!=""){  ?>
        <p>puissance: {{ $details['puissance']}}</p>
        <?php } ?>
        <?php if ($details['phase']!=""){  ?>
        <p>phase: {{ $details['phase']}}</p>
        <?php } ?>
        <?php if ($details['frequence']!=""){  ?>
            <p>Frequence : {{$details['frequence']}} </p>
        <?php } ?>
        {{-- <?php if ($details['description']!=""){  ?>
            <p>Description : {{$details['description']}} </p>
        <?php } ?> --}}
        <p>Materiel à protéger: {{$details['materiel']}} </p>
        <p>Remarque du client : {{$details['remarque']}} </p>
    <br>
        <p>Cordialement,</p>
        <p>__________________</p>
        <p>{{ $details['societe'] }}</p>
        <p>{{ $details['client'] }}, {{ $details['tel'] }}</p>
    </div>
</body>
</html>
