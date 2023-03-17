<?php 
    require_once("sistema.php");
    class Proyecto extends Sistema{
        public function get($id=null){
            $this -> db();
            if(is_null($id)){
                $sql = "select * 
                from proyecto p 
                left join departamento d on p.id_departamento = d.id_departamento";
                $st = $this-> db ->prepare($sql);
                $st -> execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                $sql = "select * 
                from proyecto p 
                left join departamento d on p.id_departamento = d.id_departamento where id_proyecto = :id";
                $st = $this-> db ->prepare($sql);
                $st -> bindParam(':id',$id,PDO::PARAM_INT);
                $st -> execute();
                $data = $st->fetchAll(PDO::FETCH_ASSOC);
            }
            return $data;
        }
        public function new($data){
            $this -> db();
            $nombrearchivo = str_replace("  ","_",$data['proyecto']);
            $nombrearchivo = substr($nombrearchivo,0,20);
            
            $sql = "insert into proyecto(proyecto, descripcion, fecha_inicial, fecha_final, id_departamento) 
            values (:proyecto, :descripcion, :fecha_inicial, :fecha_final, :id_departamento);";

            $sesubio = $this->uploadfile("archivo", '/opt/lampp/htdocs/constructora/admin/uploads/', $nombrearchivo);
            print_r($sesubio);
            if($sesubio){
                $sql = "insert into proyecto(proyecto, descripcion, fecha_inicial, fecha_final, id_departamento, archivo) 
            values (:proyecto, :descripcion, :fecha_inicial, :fecha_final, :id_departamento, :archivo);";
            }

            $st = $this-> db ->prepare($sql);
            $st -> bindParam(':proyecto',$data['proyecto'],PDO::PARAM_STR);
            $st -> bindParam(':descripcion',$data['descripcion'],PDO::PARAM_STR);
            $st -> bindParam(':fecha_inicial',$data['fecha_inicial'],PDO::PARAM_STR);
            $st -> bindParam(':fecha_final',$data['fecha_final'],PDO::PARAM_STR);
            $st -> bindParam(':id_departamento',$data['id_departamento'],PDO::PARAM_INT);
            if($sesubio){
                $st -> bindParam(':archivo',$sesubio,PDO::PARAM_STR);
            }
            $st -> execute();
            $rc = $st->rowCount();
            return $rc;
        }
        public function edit($id,$data){
            $this -> db();
            $sql = "update proyecto set proyecto= :proyecto, descripcion= :descripcion, 
            fecha_inicial= :fecha_inicial, fecha_final= :fecha_final, id_departamento= :id_departamento 
            where id_proyecto = :id";
            $st = $this-> db ->prepare($sql);
            $st -> bindParam(':id',$id,PDO::PARAM_INT);
            $st -> bindParam(':proyecto',$data['proyecto'],PDO::PARAM_STR);
            $st -> bindParam(':descripcion',$data['descripcion'],PDO::PARAM_STR);
            $st -> bindParam(':fecha_inicial',$data['fecha_inicial'],PDO::PARAM_STR);
            $st -> bindParam(':fecha_final',$data['fecha_final'],PDO::PARAM_STR);
            $st -> bindParam(':id_departamento',$data['id_departamento'],PDO::PARAM_INT);
            $st -> execute();
            $rc = $st->rowCount();
            return $rc;
            
        }
        public function delete($id){
            $this -> db();
            $sql = "delete from proyecto where id_proyecto= :id";
            $st = $this-> db ->prepare($sql);
            $st -> bindParam(':id',$id,PDO::PARAM_INT);
            $st -> execute();
            $rc = $st->rowCount();
            return $rc;
        }
        public function getOne($id){
            
        }
    }
    $proyecto = new Proyecto;
?>