<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./CSS/style.css" rel="stylesheet" />
    <link href="./CSS/normalize.css" rel="stylesheet" />
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <nav class="bannerTop" class="side-spaced">
            <div class="menu">
                <a href="index.php?page=accueil" class="fas fa-home  btn-grad "></a>
                <a href="index.php?page=catalog" class="fas fa-list-ol  btn-grad "></a>
                <div id="titreTxt">PHP-APPLI</div>
                <div><a href="index.php?page=recap" class=" fas fa-shopping-cart  btn-grad notification dropdown">
                        <div class="dropdown-content">
                            <?php
                            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                                echo "<p>Aucun produit dans votre panier...</p>";
                            } else {
                                $totalGeneral = 0;
                                echo "<table>";
                                foreach ($_SESSION['products'] as $index => $product) {
                                    $totalGeneral += $product['total'];
                                    echo '<tr><td>' . $product['qtt'] . '</td><td>  </td><td>' . $product['name'] . '</td><td> ' . $product['price'] . '€</td></tr>';
                                }
                                echo '<tr><td colspan=4 class=dropdown-total>total:' . $totalGeneral . '€</td></tr></table>';
                            ?>
                        </div>
                        <span class="badge">
                        <?php if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                                    echo "#";
                                } else {
                                    echo count($_SESSION['products']);
                                }
                            }
                        ?>
                        </span>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="wrapper">
        <div class="formA">
            <?= $content ?>
        </div>
    </div>
</body>
</html>