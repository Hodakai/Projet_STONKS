<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("participation");
mon_footer("participation");
session_start();
require_once "../Config.php";
$id = filter_input(INPUT_GET, "id");

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);
$requetes = $pdo->prepare("select * from objet where id=:id");
$requetes->bindParam(":id", $id);
$requetes->execute();

$lignes = $requetes->fetchall();


$i = 0;
if ($i=0){
    $_SESSION["ChoixUser"]=0;
    $i++;
}

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


    <div class="uneVente">
        <img class="Photo" src="<?php echo htmlspecialchars($lignes[0]["Photo1"]) ?>">
        <img class="Photo" src="<?php echo htmlspecialchars($lignes[0]["Photo2"]) ?>">
        <img class="Photo" src="<?php echo htmlspecialchars($lignes[0]["Photo3"]) ?>">
        <p class="nomVente">Nom de L'objet : <?php echo htmlspecialchars($lignes[0]["NomObjet"]) ?></p>
        <p class="nomVente">Nom du Vendeur : <?php echo htmlspecialchars($lignes[0]["vendeur"]) ?></p>
        <p class="nomVente">Description : <?php echo htmlspecialchars($lignes[0]["Description"]) ?></p>

        <div class="ParticipationEnchere">


            <form action="../actions/ActionsParticipation.php" method="post">
                <div class="form-group">
                    <label  for="user"><p class="nomVente">Entrez un prix</label>

                    <input alt="prixPropose" name="prixPropose" id="user" type="number" required>  €

                    <input alt="idClient" name="idClient" id="user" type="hidden" value="<?php echo $_SESSION["idClient"] ?>">

                    <input alt="TopPrice" name="TopPrice" id="user" type="hidden"
                           value="<?php echo $lignes[0]["TopPrix"] ?>">

                    <input alt="id" name="idObjet" id="user" type="hidden" value="<?php echo $id ?>">

                </div>

                <input type="submit" class="btn btn-outline-primary">

            </form>



            <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
            <script>
                $(document).ready(function () {
                    setInterval(function () {
                        $(".Indic").load('../MainStonks/BarreRefresh.php?id=<?php echo $id?>')
                    }, 1000);
                });
            </script>

        </div>
        <p class="Indic">-----------</p>
    </div>


</div>
</html>
