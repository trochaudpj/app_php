<?php session_start(); ?>
<?php ob_start(); ?>

<div class="wrapper">

<div class="wrapper">
<img src="./img/shadocks1.gif" width="100%" >

</div></div>
     
<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>