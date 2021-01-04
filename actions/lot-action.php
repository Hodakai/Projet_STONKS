<?php

$id_vente = filter_input(INPUT_POST, "id");
$nomLot = filter_input(INPUT_POST,"nomLot");

require_once "../Config.php";

$pdo = new PDO("mysql:host=".Config::SERVEUR. ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo -> prepare("insert into lot (Nom, id_vente) values (:Nom, :id_vente)");

$requete->bindParam(":Nom", $nomLot);
$requete->bindParam(":id_vente", $id_vente);

$requete->execute();

header("location:../détail-vente.php?id=$id_vente");
