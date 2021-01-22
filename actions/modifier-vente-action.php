<?php

$id = filter_input(INPUT_POST, "id");
$Nom = filter_input(INPUT_POST, "nomVente");
$dateDebut = filter_input(INPUT_POST, "dateDebut");
$dateFin = filter_input(INPUT_POST, "dateFin");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("update vente set nomVente = :Nom, dateDebut = :dateDebut, dateFin = :dateFin where id=:id");

$requete->bindParam(":id", $id);
$requete->bindParam(":Nom", $Nom);
$requete->bindParam(":dateDebut", $dateDebut);
$requete->bindParam(":dateFin", $dateFin);

$requete->execute();

//$requete->debugDumpParams();

header("location:../Affichages/Affichage-ventes.php");