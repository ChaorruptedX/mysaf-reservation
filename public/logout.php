<?php require_once ('layouts/header.php'); ?>

<?php
    // Remove All Session Variables
    session_unset();
    
    // Destroy the Session
    session_destroy();

    header('Location: ' . constant("BASEURL") . 'public/index.php');
?>

<?php require_once ('layouts/footer.php'); ?>