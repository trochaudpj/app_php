<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css">
    <title>Ajout produit</title>
</head>

<body>
    <header>
        <nav id="menu" class="side-spaced">
            <div id="menu-links">
                <a href="index.php">HOME</a>
                <a href="recap.php" class=" fas fa-shopping-cart  btn-grad notification">
                    <span class="badge">
                        <?php if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                            echo "#";
                        } else {
                            echo count($_SESSION['products']);
                        }
                        ?>
                    </span>

                </a>
                <?php
                if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    $_SESSION['message'] = '';
                }
                ?>
            </div>
        </nav>
    </header>
    <div class="wrapper">