<?php

$id = filter_input(INPUT_POST, "id");
$NomObjet = filter_input(INPUT_POST, "NomObjet");
$Description = filter_input(INPUT_POST, "Description");
$prixDepart = filter_input(INPUT_POST, "prixDepart");
$prixReserve = filter_input(INPUT_POST, "prixReserve");
$vendeur = filter_input(INPUT_POST, "vendeur");
$Photo1 = filter_input(INPUT_POST, "Photo1");
$Photo2 = filter_input(INPUT_POST, "Photo2");
$Photo3 = filter_input(INPUT_POST, "Photo3");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("update objet set NomObjet = :NomObjet, Description = :Description, prixDepart = :prixDepart, prixReserve = :prixReserve, vendeur = :vendeur, Photo1 = :Photo1, Photo2 = :Photo2, Photo3 = :Photo3 where id=:id");

$requete->bindParam(":id", $id);
$requete->bindParam(":NomObjet", $NomObjet);
$requete->bindParam(":Description", $Description);
$requete->bindParam(":prixDepart", $prixDepart);
$requete->bindParam(":prixReserve", $prixReserve);
$requete->bindParam(":vendeur", $vendeur);
$requete->bindParam(":Photo1", $Photo1);
$requete->bindParam(":Photo2", $Photo2);
$requete->bindParam(":Photo3", $Photo3);

$requete->execute();

header("location:../Affichages/Affichage-ventes.php");