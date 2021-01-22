<?php
require_once "../Affichages/header.php";
require_once "../phpStonks/footer.php";

$id = filter_input(INPUT_GET, "id");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select * from objet where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();

//$requete->debugDumpParams();

$lignes = $requete->fetchAll();

if (count($lignes) != 1) {
    http_response_code(404);
    echo("pas d'article pour cet id");
    die;
}

$enchere = $lignes[0];

MyHeader("Modification de " . $enchere["NomObjet"]);

?>

    <div class="modification_vente">
        <h1>Modifier le lot <?php echo $enchere["NomObjet"] ?> :</h1>
        <form action="../actions/modifier-enchere-action.php" method="post">
            <div class="CreationEncheres">
                <input type="hidden" value="<?php echo $id ?>" name="id">
                <div class="form-group">
                    <label for="NomObjet">Nom de l'enchère : </label>
                    <input type="text" id="NomObjet" name="NomObjet" value="<?php echo $enchere["NomObjet"] ?>"
                           required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Description" name="Description"
                              id="Description"><?php echo $enchere["Description"] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="prixDepart">Mise à prix : </label>
                    <input type="text" id="prixDepart" name="prixDepart" value="<?php echo $enchere["prixDepart"] ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="prixReserve">Prix de reserve : </label>
                    <input type="text" id="prixReserve" name="prixReserve" value="<?php echo $enchere["prixReserve"] ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="vendeur">Vendeur : </label>
                    <input type="text" id="vendeur" name="vendeur" value="<?php echo $enchere["vendeur"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="Photo1">URL Photo n°1 de l'objet mis aux enchères : </label>
                    <input type="text" id="Photo1" name="Photo1" value="<?php echo $enchere["Photo1"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="Photo2">URL Photo n°2 (pas obligatoire) de l'objet mis aux enchères : </label>
                    <input type="text" id="Photo2" name="Photo2" value="<?php echo $enchere["Photo2"] ?>">
                </div>
                <div class="form-group">
                    <label for="Photo3">URL Photo n°3 (pas obligatoire) de l'objet mis aux enchères : </label>
                    <input type="text" id="Photo3" name="Photo3" value="<?php echo $enchere["Photo3"] ?>">
                </div>
                <input type="submit" class="btn btn-outline-primary">
            </div>
        </form>
    </div>

<?php
mon_footer("admin");