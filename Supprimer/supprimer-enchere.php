<?php

session_start();

require_once "../Affichages/header.php";
require_once "../phpStonks/footer.php";

MyHeader("Suppresion d'une enchère");

$token = rand(0, 1000000);
$_SESSION["token"] = $token;

$id = filter_input(INPUT_GET, "id");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select * from objet where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();

$lignes = $requete->fetchAll();

if (count($lignes) != 1) {
    http_response_code(404);
    echo("Pas d'encheres pour cet id");
    die;
}

?>

    <h1>Supprimer l'enchere :</h1>
    <form action="../actions/supprimer-enchere-action.php" method="post">
        <input type="hidden" value="<?php echo $token ?>" name="token">
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <h4>Etes-vous sûr de vouloir supprimer cette enchere ?</h4>
        <input type="submit" class="btn btn-danger">
    </form>

<?php
mon_footer("supprimer");
