<?php
require_once("sistema.php");
class Departamento extends Sistema{
    public  function getAll(){
        $this -> db();
        $sql = "select * from departamento";
        $st = $this->db -> prepare($sql);
        $st -> execute();
        $data = $st -> fetchAll();      
        return $data; 
    }
}

$web = new Departamento;
?>