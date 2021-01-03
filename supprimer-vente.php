<?php

session_start();

require_once "header.php";
require_once "footer.php";

MyHeader("Suppresion d'une vente");

$token = rand(0, 1000000);
$_SESSION["token"] = $token;

$id = filter_input(INPUT_GET, "id");

require_once "Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select id, titre from articles where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();

$lignes = $requete->fetchAll();

if (count($lignes) != 1) {
    http_response_code(404);
    echo("Pas de ventes pour cet id");
    die;
}

$vente = $lignes[0];

MyHeader("Suppresion de la vente");
?>

    <h1>Supprimer l'article : <?php echo $vente["nomVente"]?></h1>
    <form action="actions/supprimer-vente-action.php" method="post">
        <input type="hidden" value="<?php echo $token ?>" name="token">
        <input type="hidden" value="<?php echo $vente["id"] ?>" name="id">
        <h4>Etes-vous sûr de vouloir supprimer cet article ?</h4>
        <input type="submit" class="btn btn-danger">
    </form>

<?php
MyFooter();