<?php
session_start();
switch ($_GET['todo']):
    case 'trash':
        unset($_SESSION['products']);
        $_SESSION['message'] = 'suppression du panier effectuée.';
        header("Location:index.php?page=recap");
        die;
    case 'add':
        $_SESSION['products'][$_GET['index']]['qtt']++;
        $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['price'] * $_SESSION['products'][$_GET['index']]['qtt'];
        $_SESSION['message'] = 'quantité produit mise a jour.';
        header("Location:index.php?page=recap");
        die;
    case 'sub':
        $_SESSION['products'][$_GET['index']]['qtt']--;
        $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['price'] * $_SESSION['products'][$_GET['index']]['qtt'];
        $_SESSION['message'] = 'quantité produit mise a jour.';
        header("Location:index.php?page=recap");
        die;
    case 'del':
        unset($_SESSION['products'][$_GET['index']]);
        $_SESSION['message'] = 'suppression produit  effectuée.';
        header("Location:index.php?page=accueil");
        die;
endswitch;
?>