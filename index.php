        <?php session_start();
        include'template/header.php'; ?>
        <h1>Ajouter un produit</h1>
        <form action="Traitement.php" method="post">
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" class ="btn-grad" value="Ajouter produit">
            </p>
        </form>

      <?php include'template/footer.php'; ?>
