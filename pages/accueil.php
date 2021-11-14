<?php
if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role='alert'>
    <?php echo  '<i class="bi bi-exclamation-circle-fill"> </i>'.$_SESSION['message'];?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message']);
}
?><div class="wrapper">
    <div class="formA">
        <h3 class="display-3">Accueil</h3>

        <form action="index.php?page=entry_form" method="post">

            <div class="mb-3">
                <label class="form-label">
                    Nom du produit :</label>
                <div>
                    <input type="text" class="form-control-sm" name="name">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">
                    Prix du produit : </label>
                <div>
                    <input type="number" class="form-control-sm" step="any" name="price">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">
                    Quantité désirée :</label>
                <div>
                    <input type="number" class="form-control-sm" name="qtt" value="1">
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn  bi bi-arrow-return-right accueil-submit" value="Ajouter produit"></button>
            </div>
        </form>
    </div>
</div>