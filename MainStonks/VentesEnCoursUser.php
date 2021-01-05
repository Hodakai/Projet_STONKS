<?php
require_once "../phpStonks/headerAccueil.php";
require_once "../phpStonks/footer.php";
mon_header("Ventes en cours");
mon_footer();

require_once "../MainStonks/config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::USERNAME, Config::MOTDEPASSE);
$requete = $pdo -> prepare("select id, nomVente, dateDebut, dateFin from vente");



$ligne = $requetes->fetchall();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../cssStonks/VentesEnCoursUser.css" type="text/css">
    <title>Ventes En Cours</title>
</head>
<br><br><br><br><br><br>
<body>








<?php
for ($i = 0;
     $i < count($ligne);
     $i++) {
    ?>


    <?php
}
?>

</body>
</html>
