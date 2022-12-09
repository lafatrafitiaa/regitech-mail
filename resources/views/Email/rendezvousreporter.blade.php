<!DOCTYPE html>
<html>
<head>
    <title>Validation rendez-vous</title>
</head>
<body>
    <img src="{{asset('assets/images/logo/logoR.png')}}"  alt="">
    <p>Bonjour {{ $details['mailclient'] }},</p>

    <p>Cher client {{ $details['societe'] }}, votre rendez-vous pour {{ $details['daterdv'] }} à {{ $details['heurerdv'] }} à {{ $details['lieu'] }} a été reporté.</p>
    <p>Les détails de votre nouveau rendez-vous</p>
    <p>Date : {{ $details['datenouveau'] }} à {{ $details['heurenouveau'] }}</p>
    <p>Lieu : {{ $details['lieunouveau'] }}</p>

    <p>Pour plus de détail, contactez-nous.</p>

    <p>Cordialement,</p>
    <p>__________________</p>
    <p>Regitech OI</p>
    <p>II W 19G, Antsakaviro 101 Antananarivo Madagascar</p>
    <p>Contact@regitech-oi.com, +261 32 12 710 00</p>
</body>
</html>
