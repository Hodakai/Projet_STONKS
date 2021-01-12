<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("Lots Disponibles");
mon_footer("Lots Disponibles");

require_once "../MainStonks/config.php";
$id=filter_input(INPUT_GET,"id");



$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::USERNAME, Config::MDP);
$requetes = $pdo->prepare("select * from lot where id_vente=:id");
$requetes->bindParam(":id",$id);

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
    <title>Lots Disponibles</title>
</head>


<div class="presentationVentes">

    <?php
    for ($i = 0;
         $i < count($lignes);
         $i++){
        ?>

        <div class="uneVente">
            <h4 class="nomVente"><?php echo htmlspecialchars($lignes[$i]["Nom"]) ?></h4>
            <a href="../MainStonks/AffichageObjetDansLot.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-primary">Voir Objets</a>
        </div>

        <?php
    }

    ?>
</div>


