<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MySaf Reservation</title>

    <!-- Application Configuration -->
    <?php require_once (dirname(__FILE__) . '\..\..\config\app.php'); ?>

    <!-- Helper -->
    <?php require_once (constant("ROOTPATH") . '\components\helper.php'); ?>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/main.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/nav.css' ?>">

    <!-- Scripts -->
    <script src="<?= constant("BASEURL") . 'assets/js/main.js' ?>"></script>
</head>
<body>

<?php require_once (constant("ROOTPATH") . '\config\database.php'); ?>

<?php require_once (constant("ROOTPATH") . '\public\layouts\navigation\nav-guest.php'); $side_nav_content = false; ?>

<?php // require_once (constant("ROOTPATH") . '\public\layouts\navigation\nav-user.php'); $side_nav_content = false; ?>

<?php // require_once (constant("ROOTPATH") . '\public\layouts\navigation\nav-committee.php'); $side_nav_content = true; ?>

<div class="<?= ($side_nav_content) ? "side-nav-" : null; ?>content">