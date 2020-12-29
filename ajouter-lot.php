<?php

require_once "header.php";
require_once "footer.php";

MyHeader("Page admin vente de GBC");

?>
<h1>Ajouter un lot à une vente</h1>
<form action="actions/lot-action.php" method="post">
    <div class="form-group">
        <label for="nomVente">Nom de la vente où se trouve le lot que vous voulez créer : </label>
        <input type="text" id="nomVente" name="nomVente" required>
    </div>
    <div class="form-group">
        <label for="nomLot">Nom du lot : </label>
        <input type="text" id="nomLot" name="nomLot" required>
    </div>
    <input type="submit" class="btn-primary">
</form>

<?php
MyFooter();
?>

</body>
</html>
