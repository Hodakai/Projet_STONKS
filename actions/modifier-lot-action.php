<?php

$id = filter_input(INPUT_POST, "id");
$Nom = filter_input(INPUT_POST, "Nom");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("update lot set Nom = :Nom where id=:id");

$requete->bindParam(":id", $id);
$requete->bindParam(":Nom", $Nom);

$requete->execute();

header("location:../Affichages/Affichage-ventes.php");