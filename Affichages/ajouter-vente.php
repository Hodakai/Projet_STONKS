<?php

require_once "../Affichages/header.php";
require_once "../phpStonks/footer.php";

MyHeader("Page admin vente de GBC");

?>

<div class="form-group">
    <h2>Créer une nouvelle vente :</h2>
    <form action="../actions/vente-action.php" method="post">
        <div class="form-group">
            <label for="nomVente">Titre : </label>
            <input type="text" id="nomVente" name="nomVente" required>
        </div>
        <div class="form-group">
            <label for="dateDebut">Date de début : </label>
            <input type="datetime-local" id="dateDebut" name="dateDebut" required>
        </div>
        <div class="form-group">
            <label for="dateFin">Date de fin : </label>
            <input type="datetime-local" id="dateFin" name="dateFin" required>
        </div>
        <input type="submit" class="btn btn-outline-primary">
    </form>
</div>

<?php
mon_footer("ajouter");
?>
