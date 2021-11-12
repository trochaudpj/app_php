<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>
    <header>
        <nav id="menu" class="side-spaced">

            <a href="index.php" class="fas fa-home  btn-grad "></a>

            <div id="titreTxt">PHP-APPLI</div>

            <a href="recap.php" class=" fas fa-shopping-cart  btn-grad notification dropdown">
                <div class="dropdown-content">
                    <?php
                    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                        echo "<p>Aucun produit dans votre panier...</p>";
                    } else {
                        $totalGeneral = 0;
                        echo "<table>";
                        foreach ($_SESSION['products'] as $index => $product) {
                            $totalGeneral += $product['total'];
                            echo '<tr><td>' . $product['qtt'] . '</td><td>  </td><td>' . $product['name'] . '</td></tr>';
                        }
                        echo '<tr><td colspan=3 class=dropdown-total>' . $totalGeneral . '€</td></tr></table>'; ?>
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


        </nav>

    </header>