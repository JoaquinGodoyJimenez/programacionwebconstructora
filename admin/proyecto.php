<?php
require_once('controllers/departamento.php');
include_once('views/header.php');
include_once('views/menu.php');
include_once('views/footer.php');
$acction = (isset($_GET['action']))?isset($_GET['action']):'getAll';
switch ($action) {
    default:
        $data = $web -> getAll();
        include('views/departamento/index.php');
        break;
}

?>