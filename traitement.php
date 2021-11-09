<?php
session_start();
if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, [
        "options"  => [
            "min_range" => 0,
        ],
        "flags" => FILTER_FLAG_ALLOW_FRACTION
    ]);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    if ($name && $price && $qtt) {
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price * $qtt,
        ];
        $_SESSION['products'][] = $product;
         $_SESSION['message'] = 'produit ajouté';
    }else{
        $_SESSION['message'] = 'saisie invalide';
    }
   
    header("Location:recap.php");
    die;
} else {
  
    header("Location:index.php");
    die;
}

