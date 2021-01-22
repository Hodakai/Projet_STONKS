<?php

$username=filter_input(INPUT_POST, "Username");
$id=filter_input(INPUT_POST, "id");

require_once ("../Config.php");

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("update utilisateur set admin = '1' where Username = :Username");

$requete->bindParam(":Username", $username);

$requete->execute();

header("location:../Affichages/ajouter-admin.php");