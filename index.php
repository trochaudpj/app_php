      <?php include 'template/header.php'; ?>
      <div class="wrapper">
          <div class="formA">
          <h1>Ajouter un produit</h1>
          <?php
            if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
                echo '<h2 id="message">' . $_SESSION['message'] . '</h2>';
                $_SESSION['message'] = '';
            }
            ?>
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
                      <input type="submit" name="submit" class="btn-grad" value="Ajouter produit">
                  </p>
              </form>
          </div>
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
                    "<td><a href='traitement.php?index=$index&todo=sub'   ><i class='fas fa-minus'></i></a>" . $product['qtt'] . "
                    <a href='traitement.php?index=$index&todo=add' ><i class='fas fa-plus'></i></a>
                    <a href='traitement.php?index=$index&todo=del' class='picto-item' aria-label='suprimer le produit'  ><i class='far fa-trash-alt'></i></a></td>",
                    "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                    "</tr>";
                    $totalGeneral += $product['total'];
                }
                echo "<tr>",
                "<td colspan=3>Total général : </td>",
                "<td><a href='traitement.php?todo=trash' class='picto-item' aria-label='Vider le panier'  ><i class='far fa-trash-alt' ></i></a></td>",
                "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
                "</tr>",
                "</tbody>",
                "</table>";
            }

            ?>
        
        
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