<?php
require_once("sistema.php");
/**
 * Controller Proyecto
 */
class Proyecto extends Sistema{
    /**
    * Obtiene los proyectos solicitado
    *
    * @return array $data los proyectos solicitados
    * @param integer $id si se especifica un id solo obtiene el proyecto solicitado, de lo contrario obtiene todos
    */
    public function get($id = null){        
        $this->db();
        if (is_null($id)){
            $sql = "select * from proyecto p  left join departamento d 
            on p.id_departamento = d.id_departamento ";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "select * from proyecto p  left join departamento d 
            on p.id_departamento = d.id_departamento where p.id_proyecto=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    /**
    * Nuevo proyecto
    *
    * @return integer $rc cantidad de filas afectadas por el insert
    * @param array $data los datos del nuevo proyecto
    */
    public function new ($data){        
        $this->db();
        $nombrearchivo = str_replace(" ", "_", $data['proyecto']);
        $nombrearchivo = substr($nombrearchivo, 0, 20);

        $sql = "INSERT INTO proyecto (proyecto, descripcion, fecha_inicio,
        fecha_fin, id_departamento) 
        VALUES (:proyecto, :descripcion, :fecha_inicio, :fecha_fin
        ,:id_departamento)";

        $sesubio = $this->uploadfile("archivo", "uploads/proyectos/", $nombrearchivo);

        if ($sesubio){
            $sql = "INSERT INTO proyecto (proyecto, descripcion, fecha_inicio,
            fecha_fin, id_departamento, archivo) 
            VALUES (:proyecto, :descripcion, :fecha_inicio, :fecha_fin
            ,:id_departamento, :archivo)";
        }

        $st = $this->db->prepare($sql);
        $st->bindParam(":proyecto", $data['proyecto'], PDO::PARAM_STR);
        $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $st->bindParam(":fecha_inicio", $data['fecha_inicio'], PDO::PARAM_STR);
        $st->bindParam(":fecha_fin", $data['fecha_fin'], PDO::PARAM_STR);
        $st->bindParam(":id_departamento", $data['id_departamento'], PDO::PARAM_INT);

        if ($sesubio){
            $st->bindParam(":archivo", $sesubio, PDO::PARAM_STR);
        }
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    /**
     * Borrar proyecto
     *
     * @return integer $rc cantidad de filas afectadas por el delete
     * @param  integer $id el identificador del proyecto a eliminar
     */
    public function delete($id){
        $this->db();
        $sql = "DELETE FROM tarea WHERE id_proyecto=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $sql = "DELETE FROM proyecto WHERE id_proyecto=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    /**
     * Editar proyecto
     *
     * @return integer $rc cantidad de filas afectadas por el update
     * @param  integer $id el identificador del proyecto a editar
     *         array $data los datos modificados del proyecto
     */
    public function edit($id, $data){
        $archivo_fijo = "ruta/";

        $this->db();
        $nombrearchivo = str_replace(" ", "_", $data['proyecto']);
        $nombrearchivo = substr($nombrearchivo, 0, 20);
        $nombrearchivo = $this->uploadfile("archivo", "uploads/proyectos/", $nombrearchivo);
        if($nombrearchivo){
            $sql = "UPDATE proyecto 
            SET proyecto =:proyecto, descripcion =:descripcion,
            fecha_inicio =:fecha_inicio, fecha_fin =:fecha_fin,
            id_departamento =:id_departamento, archivo =:archivo
            where id_proyecto =:id";
        }else{
            $sql = "UPDATE proyecto 
            SET proyecto =:proyecto, descripcion =:descripcion,
            fecha_inicio =:fecha_inicio, fecha_fin =:fecha_fin,
            id_departamento =:id_departamento
            where id_proyecto =:id";
        }
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":proyecto", $data['proyecto'], PDO::PARAM_STR);
        $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $st->bindParam(":fecha_inicio", $data['fecha_inicio'], PDO::PARAM_STR);
        $st->bindParam(":fecha_fin", $data['fecha_fin'], PDO::PARAM_STR);
        $st->bindParam(":id_departamento", $data['id_departamento'], PDO::PARAM_INT);
        if($nombrearchivo){
            $st->bindParam(":archivo", $nombrearchivo, PDO::PARAM_STR);
        }
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
    /**
     * Obtener la tarea solicitada
     *
     * @return array $data la tarea solicitada
     * @param  integer $id si se especifica un id solo obtiene la tarea solicitada, de lo contrario obtiene todas
     */
    public function getTask($id = null){
        $this->db();
        if(is_null($id)){
            $sql = "select * from tarea t left join proyecto p 
            on p.id_proyecto = t.id_proyecto";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "select * from tarea t left join proyecto p 
            on p.id_proyecto = t.id_proyecto where t.id_proyecto=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    /**
     * Borrar tarea
     *
     * @return integer $rc cantidad de filas afectadas por el delete
     * @param  integer $id el identificador de la tarea a eliminar
     */
    public function deleteTask($id){
        $this->db();
        $sql = "DELETE FROM tarea WHERE id_tarea=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    /**
     * Nueva tarea
     *
     * @return integer $rc cantidad de filas afectadas por el insert
     * @param  integer $id el identificador de la tarea a insertar
     *           array $data los datos de la tarea
     */
    public function newTask ($id, $data)
    {
        $this->db();
        $sql = "INSERT INTO tarea (id_proyecto, tarea, avance) VALUES (:id_proyecto, :tarea, :avance)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_proyecto", $id, PDO::PARAM_INT);
        $st->bindParam(":tarea", $data['tarea'], PDO::PARAM_STR);
        $st->bindParam(":avance", $data['avance'], PDO::PARAM_INT);
        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
    /**
    * Obtiene las tareas solicitado
    *
    * @return array $data las tareas solicitadas
    * @param integer $id si se especifica un id solo obtiene la tarea solicitada, de lo contrario obtiene todas
    */
    public function getTaskOne($id)
    {
        $data=null;
        $this->db();
        if (is_null($id)) {
            die("Ocurrió un error");
        } else {
            $sql = "select * from tarea t left join proyecto p 
            on p.id_proyecto = t.id_proyecto where t.id_tarea=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    /**
     * Editar tarea
     *
     * @return integer $rc cantidad de filas afectadas por el update
     * @param  integer $id el identificador de la tarea a editar
     *         array $data los datos modificados de la tarea
     */
    public function editTask($id, $id_tarea, $data)
    {
        $this->db();
        $sql = "UPDATE tarea SET tarea = :tarea, avance =:avance where id_tarea= :id_tarea AND id_proyecto=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id_tarea", $id_tarea, PDO::PARAM_INT);
        $st->bindParam(":tarea", $data['tarea'], PDO::PARAM_STR);
        $st->bindParam(":avance", $data['avance'], PDO::PARAM_INT);

        $st->execute();

        $rc = $st->rowCount();
        return $rc;
    }
}
//Objeto de la clase Proyecto
$proyecto = new Proyecto; 
?>