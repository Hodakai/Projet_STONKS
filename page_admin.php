<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/edc8d5fc95.js" crossorigin="anonymous"></script>
    <link rel="icon" href="">
    <title>Admin BGC</title>
</head>
<body>

<i class="fas fa-coin"></i>

<?php

//require_once "header.php";
//require_once "footer.php";

//MonHeader("Page administrateur de GBC");

?>

<div class="création_modification_vente">
    <h2>Créer une nouvelle vente :</h2>
    <form action="action/action-ajouter.php" method="post">
        <div class="Date_de_début">
            <label for="dateDebut">Date de début : </label>
            <input type="date" id="dateDebut" name="dateDebut" required>
        </div>
        <div class="Date_de_Fin">
            <label for="dateFin">Date de fin : </label>
            <input type="date" id="dateFin" name="dateFin" required>
        </div>
        <div class="Titre">
            <label for="nomVente">Titre : </label>
            <input type="text" id="nomVente" name="nomVente" required>
        </div>
        <div class="Nombre_de_lots">
            <label for="nbLot">Nombre de lots : </label>
            <input type="number" id="nbLot" name="nbLot" required>
        </div>
        <div class="Numero_lot_param">
            <label for="param_nbLot">Numéro du lot à paramétrer : </label>
            <input type="number" id="param_nbLot" name="param_nbLot" required>
        </div>
        <div class="Nb_obj_lots">
            <label for="nbObjLot">Nombre d'objets dans ce lot : </label>
            <input type="number" id="param_nbObjLot" name="param_nbObjLot" required>
        </div>
        <div class="Numero_obj_param">
            <label for="param_nbObj">Numéro de l'objet à paramétrer : </label>
            <input type="number" id="param_nbObj" name="param_nbObj" required>
        </div>
        <div class="Mise_a_prix">
            <label for="prixDepart">Mise à prix : </label>
            <input type="number" id="prixDepart" name="prixDepart" required>
        </div>
        <div class="Prix _de_reserve">
            <label for="prixReserve">Prix de reserve : </label>
            <input type="number" id="prixReserve" name="prixReserve" required>
        </div>
        <div class="Description">
            <label for="Description">Description : </label>
            <textarea name="Description" id="Description" cols="30" rows="10" required></textarea>
        </div>
        <div class="URL photo 1">
            <label for="Photo1">URL photo 1 : </label>
            <input type="text" id="Photo1" name="Photo1" required>
        </div>
        <div class="URL photo 2">
            <label for="Photo2">URL photo 2 : </label>
            <input type="text" id="Photo2" name="Photo2" required>
        </div>
        <div class="URL photo 3">
            <label for="Photo3">URL photo 3 : </label>
            <input type="text" id="Photo3" name="Photo3" required>
        </div>
        <input type="submit">
    </form>
</div>

<?php
//MonFooter();
?>
</body>
</html>
