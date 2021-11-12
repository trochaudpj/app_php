<?php
session_start();
// (◣◢)ψ on detruit le panier (◣◢)ψ
if (($_GET['todo'] == 'trash')) {
    unset($_SESSION['products']);
    $_SESSION['message'] = 'suppression du panier effectuée.';
}
// inc & dec de Q produit
if (isset($_GET['todo']) && isset($_GET['index'])) {
    if (($_GET['todo'] == 'add') || ($_GET['todo'] == 'sub')) {
        if ($_GET['todo'] == 'add') {
            $_SESSION['products'][$_GET['index']]['qtt']++;
        }
        if ($_GET['todo'] == 'sub') {
            $_SESSION['products'][$_GET['index']]['qtt']--;
        }
        $_SESSION['products'][$_GET['index']]['total'] = $_SESSION['products'][$_GET['index']]['price'] * $_SESSION['products'][$_GET['index']]['qtt'];
        $_SESSION['message'] = 'quantité produit mise a jour.';
    }
//suppression produit
    if ($_GET['todo'] == 'del') {
        unset($_SESSION['products'][$_GET['index']]);
        $_SESSION['message'] = 'suppression produit  effectuée.';
        header("Location:index.php?page=recap");
        die;
    }
    header("Location:index.php?page=recap");
    die;
}

// gestion du formulaire d entree produit
if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, [
        "options"  => [
            "min_range" => 0,
        ],
        "flags" => FILTER_FLAG_ALLOW_FRACTION
    ]);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT, [
        "options"  => [
            "min_range" => 0,
        ]
    ]);
    if ($name && $price && $qtt) {
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price * $qtt,
        ];
        $_SESSION['products'][] = $product;
        $_SESSION['message'] = 'produit ajouté';
    } else {
       $message ='';
        if(!$name){ $message .= 'nom produit ';}
        if(!$price && !$name){$message .= '& ';}
        if(!$price){ $message .= 'prix ';}
        if((!$name && !$qtt) || (!$price && !$qtt) ){$message .= '& ';}
        if(!$qtt){ $message .= 'quantité';}
       
        $_SESSION['message'] = $message.' invalide!';
    }
    header("Location:index.php?page=recap");
    die;
} else {
    header("Location:index.php?page=accueil");
    die;
}
