<?php

$nomVente = filter_input(INPUT_POST, nomVente);
$nomLot = filter_input(INPUT_POST,nomLot);

require_once "../Config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR. ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo -> prepare("INSERT INTO lot (Nom, id_vente) VALUES (':Nom', (SELECT id FROM vente v WHERE v.nomVente = ':NomVente'))");

$requete->bindParam(":Nom", $nomLot);
$requete->bindParam(":NomVente", $nomVente);

$requete->execute();

header("location:../ajouter-lot.php");

/*INSERT INTO lot (Nom)
SELECT 'YEET'
FROM vente
WHERE vente.nomVente = 'Miam';*/
