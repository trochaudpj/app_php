<?php
if (isset($_SESSION['message']) || !empty($_SESSION['message'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role='alert'>
        <?php echo $_SESSION['message']; ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>
<div class="wrapper">
    <div class="formA">

        <img src="./img/peugeot-404.jpg" width="100%">
    </div>
</div>