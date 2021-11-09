<?php
session_start();
if ( isset($_GET['todo']) && isset($_GET['index'])) {
    if($_GET['todo']=='add'){
            $_SESSION['products'][$_GET['index']]['qtt']++;
        $_SESSION['message'] = ' ++ produit'.'//'.$_GET['todo'].'//'.$_GET['index'].'//'. $_SESSION["products"][$_post['index']]['qtt'];
    }
    if($_GET['todo']=='sub'){
        $_SESSION['products'][$_GET['index']]['qtt']--;
    $_SESSION['message'] = ' -- produit'.'//'.$_GET['todo'].'//'.$_GET['index'].'//'. $_SESSION["products"][$_post['index']]['qtt'];
}
$_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['price'] * $_SESSION['products'][$_GET['index']]['qtt'];
$_SESSION['message'] = 'quantité produit'.$_GET['index'].' mise a jour.';
    header("Location:recap.php");
    die;
} else {
    $_SESSION['message'] = ' echec modif';
        header("Location:recap.php");
    die;
}
