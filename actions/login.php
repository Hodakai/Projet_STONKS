<?php
$Username = filter_input(INPUT_POST, "Username");
$MDP = filter_input(INPUT_POST, "Mdp");
$ID = filter_input(INPUT_POST,'Id');



require_once "../MainStonks/config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::USERNAME, Config::MDP);

$requete = $pdo->prepare("select * from utilisateur where Username= :Username and MDP=:Mdp");

$requete->bindParam(":Username",$Username);
$requete->bindParam(":Mdp",$MDP);

$requete->execute();


$lignes=$requete->fetchAll();

if (count($lignes) == 1){
    $admin=$lignes["admin"];
    if ($admin == 1){
        echo "ez";
    }
    else if ($admin == 0){
        header("location:../MainStonks/Accueil.php");
    }
}

header("location:../MainStonks/Affichage_Login.php");



?>