<?php
session_start();
$Username = filter_input(INPUT_POST, "Username");
$MDP = filter_input(INPUT_POST, "Mdp");


$token=filter_input(INPUT_POST, "token");
require_once "../Config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select * from utilisateur where Username=:Username and MDP=:Mdp");

$requete->bindParam(":Username",$Username);
$requete->bindParam(":Mdp",$MDP);

$requete->execute();


$lignes=$requete->fetchAll();

if ($token!=$_SESSION["token"]) {
    echo "Accès refusé";
    die;
}

if (count($lignes) == 1 ){
    $admin=$lignes[0]["admin"];
    $ID=$lignes[0]["id"];
    $_SESSION["idClient"] = $ID;
   $_SESSION["prixPropose"] = 0;
    if ($admin == 1 ){
        header("location:../Affichages/index.php");
    }

    else {
            header("location:../MainStonks/Accueil.php");
        }

}

else {
    header("location:../MainStonks/Affichage_Login.php");
}



