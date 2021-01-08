<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/nouislider.min.css">
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/plyr.css">
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/photoswipe.css">
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/default-skin.css">
    <link rel="stylesheet" href="<?php echo URL?>/publics/frontend/css/main.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="icon/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body class="body">

<div class="sign section--bg" data-bg="<?php echo URL?>/publics/frontend/img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- authorization form -->
                    <form action="<?php echo URL ?>/admin/login" method="post" class="sign__form">
                        <a href="index.html" class="sign__logo">
                            <img src="<?php echo URL?>/publics/frontend/img/logo.svg" alt="">
                        </a>

                        <div class="sign__group">
                            <input type="text" class="sign__input" name="email" placeholder="Email">
                            <br>
                            <?php if (!empty($_SESSION['error']['email'])) {?>
                                <span style="color: red"><?php echo $_SESSION['error']['email']?></span>
                            <?php }?>
                        </div>

                        <div class="sign__group">
                            <input type="password" class="sign__input" name="password" placeholder="Password">
                            <br>
                            <?php if (!empty($_SESSION['error']['password'])) {?>
                                <span style="color: red"><?php echo $_SESSION['error']['password']?></span>
                            <?php }?>
                        </div>

                        <button class="sign__btn" type="submit">Đăng nhập</button>
                    </form>
                    <!-- end authorization form -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (!empty($_SESSION['error'])) {
    unset($_SESSION['error']);
}
?>

<!-- JS -->
<script src="<?php echo URL?>/publics/frontend/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/owl.carousel.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/jquery.mousewheel.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/jquery.mCustomScrollbar.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/wNumb.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/nouislider.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/plyr.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/jquery.morelines.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/photoswipe.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/photoswipe-ui-default.min.js"></script>
<script src="<?php echo URL?>/publics/frontend/js/main.js"></script>
</body>

</html>