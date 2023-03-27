<?php 
session_start();
print_r($_SESSION);
$_SESSION["ejemplo"] = 20;
print_r($_SESSION);
?>