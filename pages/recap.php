<?php session_start(); ?>
<?php ob_start(); ?>
<div class="formA">
    <h1>Panier</h1>
    <?php
    if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
        echo '<h2 id="message">' . $_SESSION['message'] . '</h2>';
        $_SESSION['message'] = '';
    }
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit dans votre panier...</p>";
    } else {
        echo "<table id='recap'>",
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
            "<td><a href='index.php?page=recap_form&index=$index&todo=sub'   ><i class='fas fa-minus'></i></a>" . $product['qtt'] . "
                    <a href='index.php?page=recap_form&index=$index&todo=add' ><i class='fas fa-plus'></i></a>
                    <a href='index.php?page=recap_form&index=$index&todo=del' class='picto-item' aria-label='suprimer le produit'  ><i class='far fa-trash-alt'></i></a></td>",
            "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
            "</tr>";
            $totalGeneral += $product['total'];
        }
        echo "<tr>",
        "<td colspan=3>Total général : </td>",
        "<td><a href='index.php?page=recap_form&todo=trash' class='picto-item' aria-label='Vider le panier'  ><i class='far fa-trash-alt' ></i></a></td>",
        "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
        "</tr>",
        "</tbody>",
        "</table>";
    }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>