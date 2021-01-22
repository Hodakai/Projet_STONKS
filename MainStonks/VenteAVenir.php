<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("Vente à Venir");
mon_footer("Vente à venir");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);
$requetes = $pdo->prepare("select * from vente where etape=0");
$requetes->execute();

$lignes = $requetes->fetchall();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../cssStonks/VentesEnCoursUser.css" type="text/css">
    <title>Ventes à Venir</title>
</head>


<div class="presentationVentes">

    <?php

    for ($i = 0;
         $i < count($lignes);
         $i++) {
        $tmp = $lignes[$i]["id"];
        if (strtotime($lignes[$i]["dateDebut"]) <= strtotime(date("Y-m-d H:i:s"))) {
            $requetes2 = $pdo->prepare("update vente set etape = 1 where id=:id ");
            $requetes2->bindParam(":id", $tmp);
            $requetes2->execute();

        }
        ?>


        <div class="uneVente">
            <h4 class="nomVente"><?php echo htmlspecialchars($lignes[$i]["nomVente"]) ?></h4>
            <p class="nomVente">cette vente démarrera le <?php echo htmlspecialchars($lignes[$i]["dateDebut"]) ?></p>
            <p class="nomVente">et finira le <?php echo htmlspecialchars($lignes[$i]["dateFin"]) ?></p>
        </div>

        <?php
    }
    ?>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            setInterval(function () {
                $(".presentationVentes").reload('../MainStonks/VenteAVenir.php.php')
            }, 500);
        });
    </script>
</div>
