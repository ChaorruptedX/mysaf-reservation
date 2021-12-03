<!-- Application Configuration -->
<?php require_once (dirname(__FILE__) . '\..\..\config\app.php'); ?>

<!-- Helper -->
<?php require_once (constant("ROOTPATH") . '\components\helper.php'); ?>

<!-- Database Connection -->
<?php require_once (constant("ROOTPATH") . '\config\database.php'); ?>

<!-- Session -->
<?php // require_once (constant("ROOTPATH") . '\components\session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="application-name" content="MySaf Reservation">
    <meta name="description" content="A web-based application that is focus on management of mosque congregation during pandemic COVID-19">
    <meta name="author" content="Ameerul Zaki, Mohd Asyraf, Abu Dzar">
    <meta name="keywords" content="MySaf, Reservation, Mosque, Congregation, Pandemic, COVID-19">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MySaf Reservation</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/main.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/nav.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/login.css' ?>">

    <!-- Scripts -->
    <script src="<?= constant("BASEURL") . 'assets/js/main.js' ?>"></script>
</head>
<body>

<?php require_once (constant("ROOTPATH") . '\public\layouts\navigation\nav-guest.php'); $side_nav_content = false; ?>

<?php // require_once (constant("ROOTPATH") . '\public\layouts\navigation\nav-user.php'); $side_nav_content = false; ?>

<?php // require_once (constant("ROOTPATH") . '\public\layouts\navigation\nav-committee.php'); $side_nav_content = true; ?>

<div class="<?= ($side_nav_content) ? "side-nav-" : null; ?>content">