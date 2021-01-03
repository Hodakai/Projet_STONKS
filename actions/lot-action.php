<?php

$nomVente = filter_input(INPUT_POST, "nomVente");
$nomLot = filter_input(INPUT_POST,"nomLot");

var_dump($nomLot);
var_dump($nomVente);

require_once "../Config.php";

$pdo = new PDO("mysql:host=".Config::SERVEUR. ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo -> prepare("insert into lot (Nom, id_vente) values (':Nom', (select id from vente where vente.nomVente = ':NomVente'))");

$requete->bindParam(":Nom", $nomLot);
$requete->bindParam(":NomVente", $nomVente);

$requete->execute();

var_dump($requete);

//header("location:../ajouter-enchère.php");
