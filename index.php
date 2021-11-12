<?php
ob_start();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'accueil';
}
switch ($page):
    case 'accueil':
        $title = "Site perso :: Accueil";
        include 'pages/accueil.php';
        break;
    case 'catalog':
        $title = "Site perso :: Page de catalogue";
        include 'pages/catalog.php';
        break;
    case 'traitement':
        $title = "Site perso :: Page de traitement";
        include 'pages/traitement.php';
        break;
    case 'recap':
        $title = "Site perso :: Page de recap";
        include 'pages/recap.php';
        break;
    default:
        $title = "Site perso :: Accueil";
        include 'pages/accueil.php';
        break;
endswitch;
$contenu = ob_get_clean();
include 'template/template.php';
