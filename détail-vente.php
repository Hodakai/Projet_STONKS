<?php

require_once "header.php";
require_once "footer.php";

$idVente = filter_input(INPUT_GET, "id");

require_once "Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select Nom from lot where id_vente = :id");

$requete->bindParam(":id", $idVente);

$requete->execute();

$lignes = $requete->fetchAll();

MyHeader("Détail de la vente");

?>

<h1>Lots dans cette vente : </h1>

<div class="row">
    <?php
    for ($i = 0; $i < count($lignes); $i++) {
        ?>

        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nom : <?php echo htmlspecialchars($lignes[$i]["Nom"])?></h5>
                    <a href="détail-vente.php?id=<?php echo htmlspecialchars($lignes[$i]["id"]) ?>" class="btn btn-sm btn-primary">Voir les enchères du lot...</a>
                    <a href="modifier-vente.php?id=<?php echo htmlspecialchars($lignes[$i]["id"]) ?>" class="btn btn-sm btn-warning">Modifier</a>
                    <a href="supprimer-lot.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-danger">Supprimer</a>
                </div>
            </div>
        </div>

        <?php
    }

    ?>
</div>
<div class="CreationLots">
    <h1>Ajouter un lot à une vente</h1>
    <form action="actions/lot-action.php" method="post">
        <input type="hidden" value="<?php echo $idVente?>" name="id">
        <div class="form-group">
            <label for="nomLot">Nom du lot : </label>
            <input type="text" id="nomLot" name="nomLot" required>
        </div>
        <input type="submit" class="btn btn-outline-primary">
    </form>
</div>
<?php
MyFooter();
?>
