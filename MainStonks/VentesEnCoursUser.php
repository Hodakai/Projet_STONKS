<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("Ventes en cours");
mon_footer("Ventes En Cours");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);
$requetes = $pdo->prepare("select * from vente where etape=1");

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
            $tmp = $lignes[$i]["id"];
            if (strtotime($lignes[$i]["dateFin"]) <= strtotime(date("Y-m-d H:i:s"))) {
                $requetes2 = $pdo->prepare("update vente set etape = 2 where id=:id ");
                $requetes2->bindParam(":id", $tmp);
                $requetes2->execute();


            }
        ?>

        <div class="uneVente">
            <h4 class="nomVente">Nom : <?php echo htmlspecialchars($lignes[$i]["nomVente"]) ?></h4>
            <p class="nomVente">Date de Début : <?php echo htmlspecialchars($lignes[$i]["dateDebut"]) ?></p>
            <p class="nomVente">Date de Fin :<?php echo htmlspecialchars($lignes[$i]["dateFin"]) ?></p>
            <button type="button" aria="hidden"><a href="../MainStonks/AffichageLotsduneVente.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-primary">Voir les lots </a></button>
        </div>

        <?php
    }

    ?>
    </div>


