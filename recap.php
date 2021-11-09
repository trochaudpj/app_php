<?php
 include'template/header.php';
 echo '<h1>Panier</h1>';
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
                    "<td><a href='traitement.php?index=$index&todo=sub' ><i class='fas fa-minus'></i></a>". $product['qtt'] . "
                    <a href='traitement.php?index=$index&todo=add' ><i class='fas fa-plus'></i></a>
                    <a href='traitement.php?index=$index&todo=del' ><i class='far fa-trash-alt'></i></a></td>",
                    "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                "</tr>";
            $totalGeneral+= $product['total'];
        }
        echo "<tr>",
                "<td colspan=3>Total général : </td>",
                "<td><a href='traitement.php?todo=trash' ><i class='far fa-trash-alt'></i></a></td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
            "</tr>",
        "</tbody>",
        "</table>";
    }
    
    ?>
 <?php include'template/footer.php'; ?>