<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("participation a une enchère");
mon_footer("participation a une enchère");

require_once "../MainStonks/config.php";
$id=filter_input(INPUT_GET,"id");

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::USERNAME, Config::MDP);
$requetes = $pdo->prepare("select * from objet where lot=:id");
$requetes->bindParam(":id",$id);
$requetes->execute();

$lignes = $requetes->fetchall();

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../cssStonks/VentesEnCoursUser.css" type="text/css">
    <title>participation a une enchère</title>
</head>


<div class="presentationVentes">

    <?php
    for ($i = 0;
    $i < count($lignes);
    $i++){
    ?>

    <div class="uneVente">
        <img src="https://i.kym-cdn.com/entries/icons/original/000/029/959/Screen_Shot_2019-06-05_at_1.26.32_PM.jpg" class="nomVente">
        <img class="nomVente"><?php echo htmlspecialchars($lignes[$i]["Photo2"]) ?>
        <img  class="nomVente"><?php echo htmlspecialchars($lignes[$i]["Photo3"]) ?>
    <p class="nomVente"><?php echo htmlspecialchars($lignes[$i]["NomObjet"]) ?></p>
    <p class="nomVente"><?php echo htmlspecialchars($lignes[$i]["vendeur"]) ?></p>
    <p class="nomVente"><?php echo htmlspecialchars($lignes[$i]["prixDepart"]) ?></p>
    <p class="nomVente"><?php echo htmlspecialchars($lignes[$i]["prixReserve"]) ?></p>
    <p class="nomVente"><?php echo htmlspecialchars($lignes[$i]["Description"]) ?></p>

    <div class="ParticipationEnchere">
        <form action="../actions_client/ActionParticipation.php" method="post">
            <div class="form-group">
                <label for="user">Entrez un prix</label>
                <input  alt="ChoixUser" name="ChoixUser" id="user" type="number" required>
            </div>
            <br><br>
            <input type="submit" class="btn btn-outline-primary">

        </form>
    </div>
</div>

<?php
}

?>

</div>
</html>
