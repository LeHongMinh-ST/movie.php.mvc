<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "app/views/frontend/includes/header.php" ?>
</head>
<body class="body">

<?php include_once "app/views/frontend/includes/main_header.php" ?>

<?php require_once "app/views/" . $view . ".php" ?>

<?php include_once 'app/views/frontend/includes/footer.php' ?>

</body>

</html>