
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS/normalize.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="./CSS/style.css" rel="stylesheet" />

    <title><?= $title ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?page=accueil">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active bi bi-house" aria-current="page" href="index.php?page=accueil" title='home'></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bi bi-list-columns" href="index.php?page=catalog" title='catalogue'></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle bi bi-cart4" href="index.php?page=recap" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" title='facture'>
                                <span class="badge bg-secondary"><?php if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                                                                        echo "0";
                                                                    } else {
                                                                        echo count($_SESSION['products']);
                                                                    }
                                                                    ?></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php
                                if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                                    echo "<li><a class='dropdown-item' href='#'>Aucun produit dans votre panier...</a></li>";
                                } else {
                                    $totalGeneral = 0;
                                    foreach ($_SESSION['products'] as $index => $product) {
                                        $totalGeneral += $product['total'];
                                        echo  "<li><a class='dropdown-item' href='index.php?page=recap'>" . $product['qtt'] . " " . $product['name'] . " " . $product['price'] . "€</a></li>";
                                    }
                                    echo "<li><hr class='dropdown-divider'></li><li><a class='dropdown-item' href='index.php?page=recap'>total:" . $totalGeneral . "€</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
            <?= $content ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>