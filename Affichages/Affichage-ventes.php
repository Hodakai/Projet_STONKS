<?php

require_once "../Affichages/header.php";
require_once "../phpStonks/footer.php";

MyHeader("Toutes les ventes");

?>

    <h1>Toutes les ventes :</h1>


<?php

require_once "../Config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select id, nomVente, dateDebut, dateFin from vente");

$requete->execute();

$lignes = $requete->fetchAll();

?>

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
                    <a href="../Modifier/modifier-vente.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-warning">Modifier</a>
                    <a href="../Supprimer/supprimer-vente.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
        <?php
    }

    ?>
</div>
<?php
mon_footer("admin");
?>
