<?php session_start(); ?>
<?php ob_start(); ?>

<?php
if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
    echo '<h2 id="message">' . $_SESSION['message'] . '</h2>';
    $_SESSION['message'] = '';
} ?>
<img src="./img/peugeot-404.jpg" width="100%">
<?php $content = ob_get_clean(); ?>
<?php require('template/template.php'); ?>