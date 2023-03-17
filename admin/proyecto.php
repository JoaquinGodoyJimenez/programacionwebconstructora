<?php
require_once("controllers/proyecto.php");
require_once("controllers/departamento.php");
include_once('views/header.php');
include_once('views/menu.php');
include_once('views/footer.php');
$action = (isset($_GET['action']))?$_GET['action']:'get';
$id = (isset($_GET['id']))?$_GET['id']:null;
switch($action){
    case 'new':
        
        $datadepartamentos =  $departamento->get();
        if(isset($_POST['enviar'])){
            //$finne = $proyecto->uploadfile('archivo','/opt/lampp/htdocs/constructora/admin/uploads/', 1);
            //print_r($finne);
            $data = $_POST['data'];
            $cantidad = $proyecto -> new($data);
            if($cantidad){
                $proyecto -> flash('success',"Registro dado de alta con éxito");
                $data = $proyecto->get();
                include('views/proyecto/index.php');
            } else{
                $proyecto -> flash('danger',"Algo falla");
                include('views/proyecto/form.php');
            }
        } else{
            include('views/proyecto/form.php');
        }
        break;
    case 'edit':
        $datadepartamentos =  $departamento->get();
        if(isset($_POST['enviar'])){
            $data = $_POST['data'];
            $id = $_POST['data']['id_proyecto'];
            $cantidad = $proyecto -> edit($id,$data);
            if($cantidad){
                $proyecto -> flash('success',"Actualización con éxito");
                $data = $proyecto->get();
                include('views/proyecto/index.php');
            } else{
                $proyecto -> flash('danger',"Algo falla");
                $data = $proyecto->get();
                include('views/proyecto/index.php');
            }
        } else{
            $data = $proyecto ->get($id);
            include('views/proyecto/form.php');
        }
        break;

    case 'delete':
        $cantidad = $proyecto->delete($id);
            if($cantidad){
                $proyecto -> flash('success',"Registro eliminado con éxito");
                $data = $proyecto->get();
                include('views/proyecto/index.php');
            } else{
                $proyecto -> flash('danger',"Algo falla");
                $data = $proyecto->get();
                include('views/proyecto/index.php');
            }
        break;
    case 'get':
    default:
        $data = $proyecto->get($id);
        include("views/proyecto/index.php");
        break;
}

?>