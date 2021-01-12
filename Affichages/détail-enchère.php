<?php
require_once "../header.php";
require_once "../footer.php";

$id=filter_input(INPUT_GET, "id");

require_once "../Config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=phpstonks", Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select id, NomObjet, Description, prixDepart, prixReserve, vendeur, Photo1, Photo2, Photo3 from objet where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();

$lignes = $requete->fetchAll();

if(count($lignes)!=1) {
    http_response_code(404);
    echo ("pas d'article pour cet id");
    die;
}

$enchere=$lignes[0];

MyHeader(htmlspecialchars($enchere["NomObjet"]));
?>

    <h1>Nom de l'objet : <?php echo htmlspecialchars($enchere["NomObjet"])?></h1>
    <img src="<?php echo htmlspecialchars($enchere["Photo1"])?>">
    <img src="<?php echo htmlspecialchars($enchere["Photo2"])?>">
    <img src="<?php echo htmlspecialchars($enchere["Photo3"])?>">
    <p>Description : <?php echo htmlspecialchars($enchere["Description"])?></p>
    <p>Prix de départ : <?php echo htmlspecialchars($enchere["prixDepart"])?>€</p>
    <p>Prix de réserve : <?php echo htmlspecialchars($enchere["prixReserve"])?>€</p>
    <p>Vendu par : <?php echo htmlspecialchars($enchere["vendeur"])?></p>

<?php
MyFooter();
?>