<?php

require_once '../header.php';
require_once '../footer.php';

MyHeader("Gestion utilisateur");

require_once "../Config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select id, Username, admin from utilisateur");

$requete->execute();

$lignes = $requete->fetchAll();

?>
<h1>Tous les utilisateurs de Game Bid Coin : </h1>

<div class="row">
    <?php
    for ($i = 0; $i < count($lignes); $i++) {
        $admin = $lignes[$i]["admin"];
        ?>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nom : <?php echo htmlspecialchars($lignes[$i]["Username"]) ?></h5>
                    <?php
                    if ($admin == '1') {
                        ?>
                        <p class="card-title">Grade : ADMIN</p>
                        <?php
                    } else {
                        ?>
                        <p class="card-title">Grade : CLIENT</p>
                        <?php
                    }
                    ?>
                    <a href="/Projet_STONKS/Supprimer/supprimer-utilisateur.php?id=<?php echo htmlspecialchars($lignes[$i]["id"]) ?>"
                       class="btn btn-sm btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
        <?php
    }

    ?>
</div>

<?php
MyFooter();