<?php 
session_start();
print_r($_SESSION);
$_SESSION["ejemplo"]++;
print_r($_SESSION);
?>