<?php session_start(); ?>
<?php

$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['email'] = null;
$_SESSION['password'] = null;

header("location: ../index.php");

?>