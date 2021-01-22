<?php

$idLot = filter_input(INPUT_POST, "id");
$nomEnchere = filter_input(INPUT_POST, "nomEnchere");
$Description = filter_input(INPUT_POST, "Description");
$prixDepart = filter_input(INPUT_POST, "prixDepart");
$prixReserve = filter_input(INPUT_POST, "prixReserve");
$vendeur = filter_input(INPUT_POST, "vendeur");
$Photo1 = filter_input(INPUT_POST, "Photo1");
$Photo2 = filter_input(INPUT_POST, "Photo2");
$Photo3 = filter_input(INPUT_POST, "Photo3");

require_once "../Config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("insert into objet (lot, NomObjet, Description, prixDepart, prixReserve, TopPrix, vendeur, Photo1, Photo2, Photo3) values (:lot,:nomObjet, :description, :prixDepart, :prixReserve, :prixDepart, :vendeur, :Photo1, :Photo2, :Photo3)");

$requete->bindParam(":lot", $idLot);
$requete->bindParam(":nomObjet", $nomEnchere);
$requete->bindParam(":description", $Description);
$requete->bindParam(":prixDepart", $prixDepart);
$requete->bindParam(":prixReserve", $prixReserve);
$requete->bindParam(":vendeur", $vendeur);
$requete->bindParam(":Photo1", $Photo1);
$requete->bindParam(":Photo2", $Photo2);
$requete->bindParam(":Photo3", $Photo3);

$requete->execute();

//$requete->debugDumpParams();

header("location:../Affichages/affichage_encheres.php?id=$idLot");