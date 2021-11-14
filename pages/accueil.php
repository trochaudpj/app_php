<?php session_start(); ?>
<?php ob_start();

if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
    echo '<h2 id="message">' . $_SESSION['message'] . '</h2>';
    $_SESSION['message'] = '';
}
?> <h3 class="display-3">Accueil</h3>
<form action="index.php?page=entry_form" method="post">
   
    <div class="mb-3">
        <label class="form-label">
            Nom du produit :</label><div>
        <input type="text" class="form-control-sm" name="name"></div>
    </div>
    <div class="mb-3">
        <label class="form-label">
            Prix du produit : </label><div>
        <input type="number" class="form-control-sm" step="any" name="price"></div>
    </div>
    <div class="mb-3">
        <label class="form-label">
            Quantité désirée :</label><div>
        <input type="number" class="form-control-sm" name="qtt" value="1"></div>
    </div>
    <div class="mb-3">
        <button type="submit" name="submit" class="btn  bi bi-arrow-return-right accueil-submit" value="Ajouter produit"></button>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>