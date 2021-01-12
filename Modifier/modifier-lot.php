<?php
require_once "../header.php";
require_once "../footer.php";

$id = filter_input(INPUT_GET, "id");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select * from lot where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();

$lignes = $requete->fetchAll();

if (count($lignes) != 1) {
    http_response_code(404);
    echo("pas d'article pour cet id");
    die;
}

$lot = $lignes[0];

MyHeader("Modification de " . $lot["Nom"]);

?>

    <div class="modification_vente">
        <h2>Modifier le lot <?php echo $lot["Nom"] ?> :</h2>
        <form action="/Projet_STONKS/actions/modifier-lot-action.php" method="post">
            <input type="hidden" value="<?php echo $id?>" name="id">
            <div class="Titre">
                <label for="Nom">Titre : </label>
                <input type="text" id="Nom" name="Nom" value="<?php echo $lot["Nom"] ?>" required>
            </div>
            <input type="submit" class="btn btn-outline-primary">
        </form>
    </div>

<?php
MyFooter();