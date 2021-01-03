<?php

session_start();

$id=filter_input(INPUT_GET, "id");

$token=filter_input(INPUT_GET, "token");

if ($token!=$_SESSION["token"]) {
    echo "Accès refusé";
    die;
}

require_once "../Config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("delete from where where id=:id");

$requete->bindParam(":id", $id);

$requete->execute();

header("location:../Affichage-ventes.php");
