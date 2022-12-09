<!DOCTYPE html>
<html>
<head>
    <title>Valider produit</title>
</head>
<body>
    <div style="background-color: grey">
        <img src="{{asset('assets/images/logo/logoR.png')}}"  alt="">
        <p>Bonjour {{ $details['societe'] }},</p>

        <p>Votre commande<strong>/</strong>demande de devis à propos de l'article <strong>{{ $details['subject'] }}</strong>
            faite le {{ $details['datecommande'] }} a été bien reçu.</p>

        <?php if($details['puissance'] !="" && $details['puissance']!=0) { ?>
            <p>Puissance : {{ $details['puissance'] }}W</p>
        <?php } if ($details['prix']!="" && $details['prix']!=0) {?>
            <p>Prix de: {{ $details['prix'] }}Ar
        <?php } ?>

        <?php if($details['prixdevis']!="" && $details['datevalidite']!=""){ ?>
            <p>Retour de prix de cet article est de <strong>{{ $details['prixdevis'] }}Ar</strong> valide jusqu'au <strong>{{ $details['datevalidite'] }}</strong>.</p>
        <?php } ?>

        <p>Pour plus de détail, contactez-nous.</p>

        <p>Cordialement,</p>
        <p>__________________</p>
        <p>Regitech OI</p>
        <p>II W 19G, Antsakaviro 101 Antananarivo Madagascar</p>
        <p>Contact@regitech-oi.com, +261 32 12 710 00</p>
    </div>

</body>
</html>
