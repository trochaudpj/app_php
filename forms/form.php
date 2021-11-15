<?php 
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
        $_SESSION['message'] = 'Produit ajouté';
    } else {
       $message ='';
        if(!$name){ $message .= 'Nom du produit ';}
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
?>