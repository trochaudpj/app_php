<?php session_start(); ?>
   <?php $title = 'catalog'; ?>

<?php ob_start(); ?>

        <div class="formA">
            <h1>catalogue</h1>
            <?php
            if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
                echo '<h2 id="message">' . $_SESSION['message'] . '</h2>';
                $_SESSION['message'] = '';
            }

            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                echo "<p>Aucun produit en magasin</p>";
            } else {
                echo "<table id='recap'>",
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
                    "<td><a href='traitement.php?index=$index&todo=del' class='picto-item' aria-label='suprimer le produit'  ><i class='far fa-trash-alt'></i></a>" . $index . "</td>",
                    "<td>" . $product['name'] . "</td>",
                    "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                    "</tr>";
                }
                echo "</tbody>",
                "</table>";
            }

            ?>
        </div>
     
<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>
 
  