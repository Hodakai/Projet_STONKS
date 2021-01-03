<?php

$dateDebut = filter_input(INPUT_POST,"dateDebut");
$dateFin = filter_input(INPUT_POST,"dateFin");
$nomVente = filter_input(INPUT_POST,"nomVente");

require_once "../Config.php";

$pdo = new PDO("mysql:host=".Config::SERVEUR. ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo -> prepare("insert into vente (dateDebut, dateFin, nomVente) values (:dateDebut, :dateFin, :nomVente)");

$requete->bindParam(":dateDebut", $dateDebut);
$requete->bindParam(":dateFin", $dateFin);
$requete->bindParam(":nomVente", $nomVente);

$requete->execute();

header("location:../Affichage-ventes.php");



