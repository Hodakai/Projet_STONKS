<?php

require_once "header.php";
require_once "footer.php";

MyHeader("Création d'enchères");

?>
<h1>Ajouter une enchère à un lot dans une vente</h1>

<form action="actions/enchère-action.php" method="post">
    <div class="form-group">
        <label for="nomVente">Nom de la vente où se trouve l'enchère que vous voulez créer :  </label>
        <input type="text" id="nomVente" name="nomVente" required>
    </div>
    <div class="form-group">
        <label for="nomLot">Nom du lot où se trouve l'enchère que vous voulez créer : </label>
        <input type="text" id="nomLot" name="nomLot" required>
    </div>
    <textarea class="form-control" rows="5" name="Description" id="Description"></textarea>
    <div class="form-group">
        <label for="nomEnchere">Nom de l'enchère : </label>
        <input type="text" id="nomEnchere" name="nomEnchere" required>
    </div>
    <div class="form-group">
        <label for="prixDepart">Mise à prix : </label>
        <input type="text" id="prixDepart" name="prixDepart" required>
    </div>
    <div class="form-group">
        <label for="prixReserve">Prix de reserve : </label>
        <input type="text" id="prixReserve" name="prixReserve" required>
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
    <input type="submit" class="Bouton">
</form>
