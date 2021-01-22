<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../cssStonks/VentesEnCoursUser.css" type="text/css">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?php
session_start();


require_once "../Config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);


$id = filter_input(INPUT_GET, "id");

$requetes = $pdo->prepare("select TopPrix , prixDepart from objet where id=:id");
$requetes->bindParam(":id", $id);

$requetes->execute();


$ligneu = $requetes->fetchall();


$prixPlusHaut = $ligneu[0]["TopPrix"];
$prixDepart = $ligneu[0]["prixDepart"];


$requete = $pdo->prepare("select prixPropose from encherir where idUtilisateur=:idUtilisateur and idObjet=:idObjet order by prixPropose DESC");

$requete->bindParam(":idUtilisateur", $_SESSION["idClient"]);
$requete->bindParam(":idObjet", $id);
$requete->execute();


$lignes = $requete->fetchAll();


if (count($lignes) == 0) {
    $prixPropose = 0;
} else {
    $prixPropose = $lignes[0]["prixPropose"];
}


if ($prixPropose == 0) {
    $gagner = 3;
} else if ($prixPropose < $prixDepart) {
    $gagner = 2;
} else if ($prixPropose < $prixPlusHaut) {
    $gagner = 0;

} else if ($prixPropose >= $prixPlusHaut) {
    $gagner = 1;
    $requete = $pdo->prepare("update Objet set TopPrix=:prixPropose where id=:id");
    $requete->bindParam(":prixPropose", $prixPropose);
    $requete->bindParam(":id", $id);
    $requete->execute();
}


?>
<div class=".Indic">
    <?php
    if ($gagner == 1) {
    ?>
    <br>
    <i class="fas fa-thumbs-up fa-5x"></i>
    <?php
    }
    else if ($gagner == 0)
    {
    ?>
    <br>
    <i class="fas fa-thumbs-down fa-5x"></i>
    <?php
    }
    else if ($gagner == 3){

    ?>
    <br>
    <i class="fas fa-eye-slash fa-5x"></i>
    <?php
    }
    else if ($gagner == 2){
    ?>
        <br>
        <p class="nomVente">Veuillez rentrez un prix supérieur au prix de Depart</p>

    <?php
    }
    ?>

</div>