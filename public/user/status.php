<?php

$id=$_GET['id'];
$status=$_GET['status'];

$a = $conn->prepare("UPDATE user_reservation set status=$status where id=$id");
$a->execute();
header('location:history_user.php');
?>