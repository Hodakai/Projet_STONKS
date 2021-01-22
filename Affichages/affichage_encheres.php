<?php

require_once "../Affichages/header.php";
require_once "../phpStonks/footer.php";

$id = filter_input(INPUT_GET, "id");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select id, NomObjet, vendeur, Photo1 from objet where lot=:id");

$requete->bindParam(":id", $id);

$requete->execute();

$lignes = $requete->fetchAll();

MyHeader("Création d'enchères");

?>

<h1>Enchères dans ce lot : </h1>

<div class="row">
    <?php
    for ($i = 0; $i < count($lignes); $i++) {
        ?>

        <div class="col-3">
            <div class="card">
                <img src="<?php echo $lignes[$i]["Photo1"]?>" alt="" class="card-img-bottom">
                <div class="card-body">
                    <h5 class="card-title">Nom : <?php echo htmlspecialchars($lignes[$i]["NomObjet"]) ?></h5>
                    <p class="card-text">Vendeur : <?php echo htmlspecialchars($lignes[$i]["vendeur"]) ?></p>
                    <a href="../Affichages/détail-enchère.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>"
                       class="btn btn-sm btn-primary">Voir l'enchère...</a>
                    <a href="../Modifier/modifier-enchere.php?id=<?php echo htmlspecialchars($lignes[$i]["id"]) ?>"
                       class="btn btn-sm btn-warning">Modifier</a>
                    <a href="../Supprimer/supprimer-enchere.php?id=<?php echo htmlspecialchars($lignes[$i]["id"]) ?>"
                       class="btn btn-sm btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
    <div class="CreationEncheres">
        <h1>Ajouter une enchère à un lot</h1>
    <form action="../actions/enchère-action.php" method="post" class="form-enchere">
        <input type="hidden" value="<?php echo $id?>" name="id">
        <div class="form-group">
            <label for="nomEnchere">Nom de l'enchère : </label>
            <input type="text" id="nomEnchere" name="nomEnchere" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="5" placeholder="Description de l'objet mis aux enchères" name="Description" id="Description"></textarea>
        </div>
        <div class="form-group">
            <label for="prixDepart">Mise à prix : </label>
            <input type="number" id="prixDepart" name="prixDepart" placeholder="€€€" required>
        </div>
        <div class="form-group">
            <label for="prixReserve">Prix de reserve : </label>
            <input type="number" id="prixReserve" name="prixReserve" placeholder="€€€" required>
        </div>
        <div class="form-group">
            <label for="vendeur">Vendeur : </label>
            <input type="text" id="vendeur" name="vendeur" required>
        </div>
        <div class="form-group">
            <label for="Photo1">URL Photo n°1 de l'objet mis aux enchères : </label>
            <input type="text" id="Photo1" name="Photo1" required>
        </div>
        <div class="form-group">
            <label for="Photo2">URL Photo n°2 (pas obligatoire) de l'objet mis aux enchères : </label>
            <input type="text" id="Photo2" name="Photo2">
        </div>
        <div class="form-group">
            <label for="Photo3">URL Photo n°3 (pas obligatoire) de l'objet mis aux enchères : </label>
            <input type="text" id="Photo3" name="Photo3">
        </div>
        <input type="submit" class="btn btn-outline-primary">
    </form>
    </div>

    <?php
    mon_footer("admin");
