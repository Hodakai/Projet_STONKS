<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("Ventes en cours");
mon_footer("Ventes En Cours");

require_once "../MainStonks/config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::USERNAME, Config::MDP);
$requetes = $pdo->prepare("select * from vente");

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
    <title>Ventes en Cours</title>
</head>


    <div class="presentationVentes">

        <?php
        for ($i = 0;
        $i < count($lignes);
        $i++){
        ?>

        <div class="uneVente">
            <h4 class="nomVente"><?php echo htmlspecialchars($lignes[$i]["nomVente"]) ?></h4>
            <p class="nomVente"><?php echo htmlspecialchars($lignes[$i]["dateDebut"]) ?></p>
            <p class="nomVente"><?php echo htmlspecialchars($lignes[$i]["dateFin"]) ?></p>
            <button type="button" aria="hidden"><a href="../MainStonks/AffichageLotsduneVente.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-info mb-2">Voir les lots </a></button>
        </div>

        <?php
    }

    ?>
    </div>


