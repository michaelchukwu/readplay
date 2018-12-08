<?php
session_start();
session_destroy();
$_SESSION['created']="Game Over";
header('location:login.php');
?>