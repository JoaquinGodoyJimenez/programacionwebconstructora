<?php
require_once('controllers/departamento.php');
include_once('views/header.php');
include_once('views/menu.php');
include_once('views/footer.php');
$action = (isset($_GET['action']))?isset($_GET['action']):'getAll';
switch($action){
    case 'getAll':
    default:
        $data = $web->getAll();
        include("views/departamento/index.php");
}

?>