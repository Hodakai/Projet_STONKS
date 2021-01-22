<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("Ventes Passées");
mon_footer("Ventes Passées");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);
$requetes = $pdo->prepare("select * from vente where etape=2");
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
    <title>Ventes Passées</title>
</head>


<div class="presentationVentes">

    <?php
    for ($i = 0;
         $i < count($lignes);
         $i++){

        ?>

        <div class="uneVente">
            <h4 class="nomVente"><?php echo htmlspecialchars($lignes[$i]["nomVente"]) ?></h4>
            <p class="nomVente">cette vente a démarré le <?php echo htmlspecialchars($lignes[$i]["dateDebut"]) ?></p>
            <p class="nomVente">et a fini <?php echo htmlspecialchars($lignes[$i]["dateFin"]) ?></p>
            <a href="../MainStonks/detailsvente.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-primary">détails</a>
        </div>

        <?php
    }

    ?>
</div>
