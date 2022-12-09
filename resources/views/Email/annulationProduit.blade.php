<!DOCTYPE html>
<html>
<head>
    <title>Annuler produit</title>
</head>
<body>
    <div style="border-block-color: black; align-content: center">
        <img src="{{asset('assets/images/logo/logoR.png')}}"  alt="">
        <p>Bonjour {{ $details['societe'] }},</p>

        <p>Votre commande à propos de l'article <strong>{{ $details['subject'] }}</strong>
            faite le {{ $details['datecommande'] }} a été annulé.</p>

        <p>Pour plus de détail, contactez-nous.</p>

        <p>Cordialement,</p>
        <p>__________________</p>
        <p>Regitech OI</p>
        <p>II W 19G, Antsakaviro 101 Antananarivo Madagascar</p>
        <p>Contact@regitech-oi.com, +261 32 12 710 00</p>
    </div>

</body>
</html>
