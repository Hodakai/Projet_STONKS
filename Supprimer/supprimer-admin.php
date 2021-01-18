<?php

session_start();

require_once "../header.php";
require_once "../footer.php";

MyHeader("Suppresion d'un utilisateur");

$token = rand(0, 1000000);
$_SESSION["token"] = $token;

$id = filter_input(INPUT_GET, "id");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select Username, id, admin from utilisateur where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();

//$requete->debugDumpParams();

$lignes = $requete->fetchAll();

if (count($lignes) != 1) {
    http_response_code(404);
    echo("Pas d'utilisateur pour cet id");
    die;
}

?>

    <h1>Destituer cet utilisateur de ses droits d'admin :</h1>
    <form action="../actions/supprimer-admin-action.php" method="post">
        <input type="hidden" value="<?php echo $token ?>" name="token">
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <h4>Etes-vous sûr de vouloir destituer cet utilisateur de ses droits d'admins ?</h4>
        <input type="submit" class="btn btn-danger">
    </form>

<?php
MyFooter();