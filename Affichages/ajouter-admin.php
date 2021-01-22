<?php
require_once "../Affichages/header.php";
require_once "../phpStonks/footer.php";

MyHeader("Ajouter un admin");

require_once "../Config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo -> prepare("select id, Username from utilisateur where utilisateur.admin='1'");

$requete -> execute();

$lignes = $requete->fetchAll();

?>
    <h1>Tous les admins de Game Bid Coin : </h1>

    <div class="row">
        <?php
        for ($i = 0; $i < count($lignes); $i++) {
            ?>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nom : <?php echo htmlspecialchars($lignes[$i]["Username"])?></h5>
                        <a href="../Supprimer/supprimer-admin.php?id=<?php echo htmlspecialchars($lignes[$i]["id"])?>" class="btn btn-sm btn-danger">Supprimer le statut d'admin</a>
                </div>
            </div>
            <?php
        }

        ?>
    </div>

    <div class="form-group">
        <h2>Ajouter un compte client en ADMIN :</h2>
        <form action="../actions/admin-action.php" method="post">
            <div class="form-group">
                <label for="Username">Username du compte que vous voulez passer en  ADMIN : </label>
                <input type="text" id="Username" name="Username" required>
            </div>
            <input type="submit" class="btn btn-outline-primary">
        </form>
    </div>

<?php
mon_footer("admin");
?>