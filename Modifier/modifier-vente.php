<?php
require_once "../Affichages/header.php";
require_once "../phpStonks/footer.php";

$id = filter_input(INPUT_GET, "id");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select id, nomVente, dateDebut, dateFin from vente where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();

$lignes = $requete->fetchAll();
$datedebut = $lignes[0]["dateDebut"];
$dateFin = $lignes[0]["dateFin"];

if (count($lignes) != 1) {
    http_response_code(404);
    echo("pas d'article pour cet id");
    die;
}

$vente = $lignes[0];

MyHeader("Modification de " . $vente["nomVente"]);

?>

    <div class="modification_vente">
        <h2>Modifier la vente <?php echo $vente["nomVente"] ?> :</h2>
        <form action="../actions/modifier-vente-action.php" method="post">
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <div class="Titre">
                <label for="nomVente">Titre : </label>
                <input type="text" id="nomVente" name="nomVente" value="<?php echo $vente["nomVente"] ?>" required>
            </div>
            <div class="Date_de_début">
                <label for="dateDebut">Date de début : </label>
                <input type="datetime-local" id="dateDebut" name="dateDebut" value="<?php echo $datedebut ?>" required>
            </div>
            <div class="Date_de_Fin">
                <label for="dateFin">Date de fin : </label>
                <input type="datetime-local" id="dateFin" name="dateFin" value="<?php echo $dateFin ?>" required>
            </div>
            <input type="submit" class="btn btn-outline-primary">
        </form>
    </div>

<?php
mon_footer("admin");