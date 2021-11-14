<?php
if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
    echo  $_SESSION['message'];
?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>
<div class="wrapper">

    <div class="formA">
        <h3 class="display-3">Panier</h3>
        <?php

        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo "<p>Aucun produit dans votre panier...</p>";
        } else {
            echo "<table class='table table-striped table-warning table-hover table-bordered'>",
            "<thead>",
            "<tr>",
            "<th>#</th>",
            "<th>Nom</th>",
            "<th>Prix</th>",
            "<th>Quantité</th>",
            "<th>Total</th>",
            "</tr>",
            "</thead>",
            "<tbody>";
            $totalGeneral = 0;
            foreach ($_SESSION['products'] as $index => $product) {
                echo "<tr>",
                "<td>" . $index . "</td>",
                "<td>" . $product['name'] . "</td>",
                "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                "<td><a href='index.php?page=recap_form&index=$index&todo=sub' class='bi bi-dash btn btn-outline' data-bs-toggle='tooltip' data-bs-placement='right' title='Réduire'></a>" . ' ' . $product['qtt'] . ' ' . "
                    <a href='index.php?page=recap_form&index=$index&todo=add'class='bi bi-plus btn btn-outline' data-bs-toggle='tooltip' data-bs-placement='right' title='Augmenter' ></a>
                    <a href='index.php?page=recap_form&index=$index&todo=del' class='bi bi-trash btn btn-outline' data-bs-toggle='tooltip' data-bs-placement='right' title='Suprimer' ></a></td>",
                "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                "</tr>";
                $totalGeneral += $product['total'];
            }
            echo "<tr class='table-success'>",
            "<td colspan=3>Total général : </td>",
            "<td><a href='index.php?page=recap_form&todo=trash' class='bi bi-trash btn btn-outline' data-bs-toggle='tooltip' data-bs-placement='right' title='Suprimer' ></a></td>",
            "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
            "</tr>",
            "</tbody>",
            "</table>";
        }
        ?>
    </div>
</div>
</div>