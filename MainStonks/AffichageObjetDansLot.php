<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("Objets");
mon_footer("Objets");

require_once "../Config.php";

$id=filter_input(INPUT_GET,"id");

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);
$requetes = $pdo->prepare("select * from objet where lot=:id");
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
    <title>Objets Disponibles</title>
</head>


<div class="presentationVentes">

    <?php
    for ($i = 0;
         $i < count($lignes);
         $i++){
        ?>

        <div class="uneVente">
            <img class="Photo" src="<?php echo htmlspecialchars($lignes[$i]["Photo1"]) ?>">
            <p class="nomVente">Nom de l'objet : <?php echo htmlspecialchars($lignes[$i]["NomObjet"]) ?></p>
            <p class="nomVente">Nom du Vendeur : <?php echo htmlspecialchars($lignes[$i]["vendeur"]) ?></p>
            <p class="nomVente">Prix de Départ de l'enchère : <?php echo htmlspecialchars($lignes[$i]["prixDepart"]) ?> €</p>
            <p class="nomVente">Prix de Réserve du Vendeur : <?php echo htmlspecialchars($lignes[$i]["prixReserve"]) ?> €</p>
            <p class="nomVente">Description de l'objet : <?php echo htmlspecialchars($lignes[$i]["Description"]) ?></p>


            <a href="../MainStonks/ParticiperEnchere.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-primary">Participer à l'enchère</a>
        </div>

        <?php
    }

    ?>

</html>
