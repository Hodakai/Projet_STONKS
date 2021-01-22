<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("Détails");
mon_footer("Détails");
session_start();
require_once "../Config.php";
$id = filter_input(INPUT_GET, "id");

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);
$requetes = $pdo->prepare("select * from objet where id=:id");
$requetes->bindParam(":id", $id);
$requetes->execute();

$lignes = $requetes->fetchall();
$prixReserve = $lignes[0]["prixReserve"];


$requetes2 = $pdo->prepare("select prixPropose,idUtilisateur, id from encherir where idObjet=:id ORDER by prixPropose DESC LIMIT 1");
$requetes2->bindParam(":id", $id);

$requetes2->execute();

$lignes2 = $requetes2->fetchall();
$topPrix = $lignes2[0]["prixPropose"];

$tmp = 0;
if ($topPrix >= $prixReserve) {
    $tmp = 1;
}

$idUtilisateur = $lignes2[0]["idUtilisateur"];

$requetes3 = $pdo->prepare("select Username from utilisateur where id=:idUtilisateur");

$requetes3->bindParam(":idUtilisateur", $idUtilisateur);

$requetes3->execute();

$lignes3 = $requetes3->fetchall();


$i = 0;
if ($i = 0) {
    $_SESSION["ChoixUser"] = 0;
    $i++;
}

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../cssStonks/VentesEnCoursUser.css" type="text/css">
    <title>Détails</title>
</head>


<div class="presentationVentes">


    <div class="uneVente">

        <img class="Photo" src="<?php echo htmlspecialchars($lignes[0]["Photo1"]) ?>">
        <img class="Photo" src="<?php echo htmlspecialchars($lignes[0]["Photo2"]) ?>">
        <img class="Photo" src="<?php echo htmlspecialchars($lignes[0]["Photo3"]) ?>">
        <p class="nomVente">Nom de l'objet : <?php echo htmlspecialchars($lignes[0]["NomObjet"]) ?></p>
        <p class="nomVente">Nom du Vendeur : <?php echo htmlspecialchars($lignes[0]["vendeur"]) ?></p>

        <?php
        if ($tmp = 1) {

            ?>


            <p class="nomVente">Acheteur : <?php echo htmlspecialchars($lignes3[0]["Username"]) ?></p>
            <p class="nomVente">Prix auquel l'objet a été vendu : <?php echo htmlspecialchars($lignes2[0]["prixPropose"]) ?> €</p>
            <?php
        }
        else {

        ?>
            <p class="nomVente">Cette ennchère n'a pas dépassé le prix de réserve.</p>
        <?php
        }
        ?>



        <div class="ParticipationEnchere">


        </div>
    </div>


</div>
</html>
