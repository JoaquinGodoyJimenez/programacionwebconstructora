<?php
require_once('config.php');
class Sistema{
 var $db=null;
 public function db(){
    $dsn = DBDRIVER.':host='.DBHOST.';dbname='.DBNAME.';port='.DBPORT;
    $this->db = new PDO($dsn,DBUSER,DBPASS);
 }

 public function flash($color,$mensaje){
   include('views/flash.php');
 }

 /**
  * Aqui la documentación 
  *
  *
  * @param
  */

  public function uploadfile($tipo,$ruta,$archivo){
    $name = false;
    $uploads['archivo'] = array("application/gzip", "application/zip");
$uploads['fotografia'] = array("image/jpeg", "image/gif", "image/png");
    if($_FILES[$tipo]['error']==0){
      if(in_array($_FILES[$tipo]['type'],$uploads['archivo'])){
        if($_FILES[$tipo]['size']<=2*1048*1048){
          $origen=$_FILES[$tipo]['tmp_name'];
          $ext = explode(".",$_FILES[$tipo]['name']);
          $ext = $ext[sizeof($ext)-1];
          $destino = $ruta . $archivo . "." . $ext;
          
          if(move_uploaded_file($origen, $destino)){
            $name=$destino;
          }
        }
      }
    }
    return $name;
  }
}