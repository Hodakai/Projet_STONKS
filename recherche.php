<?php

require_once "header.php";
require_once "footer.php";

MyHeader("Recherche de ventes");

$venteRecherche = filter_input(INPUT_POST, "VenteRecherche");

require_once "Config.php";
$pdo = new PDO("mysql:host=".Config::SERVEUR. ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo -> prepare("select id, nomVente, dateDebut, dateFin from vente where nomVente like :Recherche");

$requete->bindValue(":Recherche", '%'.$venteRecherche.'%');

$requete->execute();

$lignes = $requete->fetchAll();

?>

<h1>Toutes les ventes correspondant à <?php echo $venteRecherche ?> :</h1>

<div class="row">
    <?php
    for ($i = 0; $i < count($lignes); $i++) {
        ?>

        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nom : <?php echo htmlspecialchars($lignes[$i]["nomVente"])?></h5>
                    <p class="card-text">Date de début : <?php echo htmlspecialchars($lignes[$i]["dateDebut"])?></p>
                    <p class="card-text">Date de fin : <?php echo htmlspecialchars($lignes[$i]["dateFin"])?></p>
                    <a href="affichage-lots.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-primary">Voir les lots de la vente...</a>
                    <a href="modifier-vente.php?id=<?php echo htmlspecialchars($lignes[$i]["id"]) ?>" class="btn btn-sm btn-warning">Modifier</a>
                    <a href="supprimer-vente.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-danger">Supprimer</a>
                </div>
            </div>
        </div>

        <?php
    }

    ?>
</div>
<?php
MyFooter();
?>
