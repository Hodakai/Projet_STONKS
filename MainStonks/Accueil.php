<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("Accueil");
mon_footer("Accueil");
?>


<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../cssStonks/Accueil.css" type="text/css">
    <title>Accueil</title>
</head>
<br><br><br><br><br><br>
<body>
    <div class="all">
        <div class="TxtIntro">
            <p> Bienvenue sur le site de BigGameCoin.
                C'est un endroit ou vous trouverez de
                diverses ventes disponibles et classées
                pour facilité la visibilité.
                <br><br>
               <span> /\ Attention toutes ventes seront
                contrôlées automatiquement, il n'y aura
                pas de remboursement disponible.  /\ </span></p>
        </div>
        <div class="VeC">
            <a href="../MainStonks/VentesEnCoursUser.php"><p>Ventes en Cours </p></a>
        </div>
        <div class="VaV">
            <a href="../MainStonks/VenteAVenir.php"><p>Ventes à venir </p></a>
        </div>
        <div class="VT">
            <a href="../MainStonks/VentePassee.php"><p>Ventes Passées </p></a>
        </div></div>
    </body>
</html>