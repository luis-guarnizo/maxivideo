<?php
    class usernameModel{
        private $PDO;
        private $validacion = false;
        public function __construct(){
            require_once("c://xampp/htdocs/maxivideo/config/db.php");
            $conexion = new db();
            //conexión a la db
            $this->PDO = $conexion->conexion();
        }
        public function insertar($nombre){
            $stament = $this->PDO->prepare("INSERT INTO maxivideo VALUES(null, :nombre)");
            $stament -> bindParam(":nombre", $nombre);
            return ($stament->execute()) ? $this->PDO->lastInsertId() : false;
        }
        public function insertarCliente($cedula, $nombre, $direccion, $correo, $telefono, $numeroEjemplar, $fechaAlquiler, $fechaDevolucion ){
            try {
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("INSERT INTO clientes VALUES(:cedula, :nombre, :direccion, :correo, :telefono)");
                
                 
                $stament -> bindParam(":cedula", $cedula);
                $stament -> bindParam(":nombre", $nombre);
                $stament -> bindParam(":direccion", $direccion);
                $stament -> bindParam(":correo", $correo);
                $stament -> bindParam(":telefono", $telefono);
                $stament->execute();
          
                $inserted_id = $this->PDO->lastInsertId(); //get last id

                $sql = $this->PDO->prepare("INSERT INTO alquiler VALUES(null, :id_cedula, :numeroEjemplar, :fechaAlquiler, :fechaDevolucion)");
                $sql -> bindParam(":id_cedula", $cedula);
                $sql -> bindParam(":numeroEjemplar", $numeroEjemplar);
                $sql -> bindParam(":fechaAlquiler", $fechaAlquiler);
                $sql -> bindParam(":fechaDevolucion", $fechaDevolucion);
                /* if ($sql->execute()) {
                    $validacion = true;
                    
                } 
                else{
                    $validacion = false;
                } */
                
                $this->PDO->commit();
                return ($sql->execute()) ? $cedula : false;
                
                
            } catch (PDOException $ex) {
                //Something went wrong rollback!
                $this->PDO->rollBack();
                throw $ex;
            }
        }
        
        public function show($ident_cliente){
            /* $stament = $this->PDO->prepare("SELECT * FROM clientes inner join alquiler on clientes.ident_cliente=alquiler.ident_cliente where ident_cliente = :id_cliente limit 1" ); */
            /* $stament = $this->PDO->prepare("SELECT * FROM clientes, alquiler  where ident_cliente = :id_cliente  limit 1" ); */

            $stament = $this->PDO->prepare("SELECT * FROM clientes inner join alquiler on clientes.ident_cliente=alquiler.ident_cliente where alquiler.ident_cliente = :id_cliente limit 1" );
            $stament->bindParam(":id_cliente",$ident_cliente);
            return ($stament->execute()) ? $stament->fetch() : false; 
        }
        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM username");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function update($id, $nombre ){
            $stament = $this->PDO->prepare("UPDATE username SET nombre = :nombre WHERE id = :id");
            $stament-> bindParam(":nombre", $nombre);
            $stament-> bindParam(":id", $id);
            return ($stament->execute()) ? $id : false;
        }
        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM username WHERE id = :id");
            
            $stament-> bindParam(":id", $id);
            return ($stament->execute()) ? true : false;
        }
    }
?>