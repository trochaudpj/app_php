<?php session_start();
ob_start() ;
$page=$_GET['page']?$_GET['page'] : $page='accueil';
/* ancienne condition, remplacee par ternaire ci dessus
if(isset($_GET['page'])){
    $page = $_GET['page'] ;
} else { 
    $page = 'accueil';
}*/

switch ($page):
    case 'accueil':
        $title = "App :: Accueil";
        include 'pages/accueil.php';
        break;
    case 'catalog':
        $title = "App :: Page de catalogue";
        include 'pages/catalog.php';
        break;
    case 'entry_form':
        $title = "App :: Page de traitement";
        include 'forms/form.php';
        break;
    case 'recap':
        $title = "App :: Page de recap";
        include 'pages/recap.php';
        break;
    case 'recap_form':
        $title = "App :: Page de modif";
        include 'forms/recap_form.php';
        break;
    default:
        $title = "App :: 404";
        $_SESSION['message'] = 'ERROR Peugeot 404 !';
        include 'pages/NotFound.php';
        break;
endswitch;
$content = ob_get_clean() ;
include 'template/template.php';
