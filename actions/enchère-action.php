<?php

$nomVente = filter_input(INPUT_POST, nomVente);
$nomLot = filter_input(INPUT_POST, nomLot);
$nomEnchere = filter_input(INPUT_POST, nomEnchere);
$Description = filter_input(INPUT_POST, Description);
$prixDepart = filter_input(INPUT_POST, prixDepart);
$prixReserve = filter_input(INPUT_POST, prixReserve);
$Photo1 = filter_input(INPUT_POST, Photo1);
$Photo2 = filter_input(INPUT_POST, Photo2);
$Photo3 = filter_input(INPUT_POST, Photo3);

require_once "../Config.php";

$pdo = new PDO("mysql:host=".Config::SERVEUR. ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo -> prepare("");

/*INSERT INTO objet (NomObjet, lot, Description, prixDepart, prixReserve, Photo1) VALUES ('Carte Charizard', (SELECT id FROM lot l WHERE l.Nom = 'YEET'), 'Carte très rare', '20', '40', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwRl3jJ_3dIdGvvcz8FtEVZDiRaFaQS8a3PQ&usqp=CAU')*/