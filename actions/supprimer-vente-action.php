<?php

session_start();

$id=filter_input(INPUT_POST, "id");

$token=filter_input(INPUT_POST, "token");

if ($token!=$_SESSION["token"]) {
    echo "Accès refusé";
    die;
}

require_once "../Config.php";

$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("delete from vente where id=:id");

$requete->bindParam(":id", $id);


$requete->execute();


header("location:../Affichages/Affichage-ventes.php");
