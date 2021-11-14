<?php
if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role='alert'>
        <?php echo  '<i class="bi bi-exclamation-circle-fill"> </i>'.$_SESSION['message'];?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>
<div class="wrapper">
    <div class="formA">
        <div class="formA">
            <h3 class="display-3">Catalogue</h1>
                <?php

                if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                    echo "<p>Aucun produit en magasin</p>";
                } else {
                    echo "<table class='table table-striped table-warning table-hover table-bordered '>",
                    "<thead>",
                    "<tr>",
                    "<th>#</th>",
                    "<th>Nom</th>",
                    "<th>Prix</th>",
                    "</tr>",
                    "</thead>",
                    "<tbody>";
                    foreach ($_SESSION['products'] as $index => $product) {
                        echo "<tr>",
                        "<td><a  href='index.php?page=recap_form&index=$index&todo=del' class='bi bi-trash btn btn-outline' data-bs-toggle='tooltip' data-bs-placement='right' title='Suprimer'></a>" . ' ' .  $index . ' ' .  "</td>",
                        "<td>" . ' ' . $product['name'] . ' ' . "</td>",
                        "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                        "</tr>";
                    }
                    echo "</tbody>",
                    "</table>";
                } ?>
        </div>
    </div>
</div>