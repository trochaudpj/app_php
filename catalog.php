    <?php include 'template/header.php'; ?>
    <div class="wrapper">
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
                    "<td>" . $index . "</td>",
                    "<td>" . $product['name'] . "</td>",
                    "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                    "</tr>";
                }
                echo "</tbody>",
                "</table>";
            }

            ?>
        </div>
    </div>
    <?php include 'template/footer.php'; ?>