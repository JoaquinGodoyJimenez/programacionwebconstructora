<?php
require_once('controllers/departamento.php');
include_once('views/header.php');
include_once('views/menu.php');
include_once('views/footer.php');
$action = (isset($_GET['action']))?$_GET['action']:'get';
$id = (isset($_GET['action']))?$_GET['action']:null;
switch($action){
    case 'new':
        if(isset($_POST['enviar'])){
            $data = $_POST['data'];
            $cantidad = $web -> new($data); 
            if($cantidad){
                $web -> flash('success',"Registro dado de alta con éxito");
                $data = $web->get();
                include('views/departamento/index.php');
            }else{
                $web -> flash('danger',"Ocurrió un error");
                include('views/departamento/form.php');
            }
        }else{
            include('views/departamento/form.php');
        }
    break;
    case 'edit':
        $cantidad = $web -> edit($id, $data); 
        if(isset($_POST['enviar'])){
            $data = $_POST['data'];
            $id = $_POST['data']['id_departamento'];
            $cantidad = $web -> edit($id, $data); 
            if($cantidad){
                $web -> flash('success',"Registro actualizado con éxito");
                $data = $web->get();
                include('views/departamento/index.php');
            }else{
                $web -> flash('danger',"Ocurrió un error");
                $data = $web->get();
                include('views/departamento/index.php');
            }
        }else{
            $data = $web -> get($id);
            include('views/departamento/form.php');
        }
    break;
    case 'delete':
        $cantidad = $web -> delete($id); 
        if($cantidad){
            $web -> flash('success',"Registro borrado con éxito");
            $data = $web->get();
            include('views/departamento/index.php');
        }else{
            $web -> flash('danger',"Ocurrió un error");
            $data = $web->get();
            include('views/departamento/index.php');
        }
    break;
    case 'get':
    default:
        $data = $web->get($id);
        include("views/departamento/index.php");
}

?>