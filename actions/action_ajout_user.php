<?php
$Username1 = filter_input(INPUT_POST, "Username");
$MDP1 = filter_input(INPUT_POST, "MDP");



require_once "../MainStonks/config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::USERNAME, Config::MDP);

$requete = $pdo->prepare("select * from utilisateur where Username= :Username");
$requete->bindParam(":Username",$Username1);
$requete->execute();

$lignes=$requete->fetchAll();

if (count($lignes) == 1){
    $check=$lignes["Username"];
    if ($check == $Username1){

        sleep(2);
    }
    else  {
        header("location:../MainStonks/Affichage_Login.php");
    }
}



$requete = $pdo->prepare("insert into utilisateur (Username,MDP) values (:Username,:MDP)");
$requete->bindParam(":Username",$Username1);
$requete->bindParam(":MDP",$MDP1);

$requete->execute();



header("location:../MainStonks/Affichage_Login.php");


?>