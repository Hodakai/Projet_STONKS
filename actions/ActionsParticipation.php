<?php
session_start();


$TopPrice = filter_input(INPUT_POST, "TopPrice");

$prixPropose = filter_input(INPUT_POST,"prixPropose");

$idObjet = filter_input(INPUT_POST,"idObjet");
$idClient = filter_input(INPUT_POST,"idClient");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("insert into encherir (idObjet,prixPropose,idUtilisateur) values (:idObjet,:prixPropose,:idClient)");

$requete->bindParam(":idObjet", $idObjet);
$requete->bindParam(":idClient", $idClient);
$requete->bindParam(":prixPropose", $prixPropose);

$requete->execute();


$_SESSION["prixPropose"] = $prixPropose;
$_SESSION["TopPrice"] = $TopPrice;

header("location:../MainStonks/ParticiperEnchere.php?id=$idObjet");


?>