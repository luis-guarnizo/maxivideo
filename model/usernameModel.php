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
          

            $stament = $this->PDO->prepare("SELECT * FROM clientes inner join alquiler on clientes.ident_cliente=alquiler.ident_cliente where alquiler.ident_cliente = :id_cliente limit 1" );
            $stament->bindParam(":id_cliente",$ident_cliente);
            return ($stament->execute()) ? $stament->fetch() : false; 
        }
        public function consult($ident_cliente){
           
            $stament = $this->PDO->prepare("SELECT * FROM clientes inner join alquiler on clientes.ident_cliente=alquiler.ident_cliente where alquiler.ident_cliente = :id_cliente limit 1" );
            $stament->bindParam(":id_cliente",$ident_cliente);
            $stament->execute();
            
            return ($stament->execute()) ? $stament->fetch() : false;
        }

        public function consult_resumen($numero_ejemplar){
           
            $stament = $this->PDO->prepare("SELECT * FROM ejemplares  where numero_ejemplar = :numero_ejemplar limit 1" );
            $stament->bindParam(":numero_ejemplar",$numero_ejemplar);
            $stament->execute();
            
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function consult_pelicula($id_pelicula){
           
            $stament = $this->PDO->prepare("SELECT * FROM peliculas  where id_pelicula = :id_pelicula limit 1" );
            $stament->bindParam(":id_pelicula",$id_pelicula);
            $stament->execute();
            
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function consult_pelicula_director($id_pelicula){
           
            $stament = $this->PDO->prepare("SELECT * FROM pelicula_director  where id_pelicula = :id_pelicula limit 1" );
            $stament->bindParam(":id_pelicula",$id_pelicula);
            $stament->execute();
            
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function consult_director($id_director){
           
            $stament = $this->PDO->prepare("SELECT * FROM directores  where id_director = :id_director limit 1" );
            $stament->bindParam(":id_director",$id_director);
            $stament->execute();
            
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function consult_pelicula_actor($id_pelicula){
           
            $stament = $this->PDO->prepare("SELECT * FROM pelicula_actor  where id_pelicula = :id_pelicula limit 1" );
            $stament->bindParam(":id_pelicula",$id_pelicula);
            $stament->execute();
            
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        public function consult_actor($id_actor){
           
            $stament = $this->PDO->prepare("SELECT * FROM actores  where id_actor = :id_actor limit 1" );
            $stament->bindParam(":id_actor",$id_actor);
            $stament->execute();
            
            return ($stament->execute()) ? $stament->fetch() : false;
        }
        

        
        
        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM clientes");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function update($ident_cliente, $nombre, $direccion, $correo, $telefono, $numero_ejemplar, $fecha_alquiler, $fecha_devolucion){
            
            try {
                $this->PDO->beginTransaction();
                $stament = $this->PDO->prepare("UPDATE clientes  SET nombre = :nombre, direccion = :direccion, correo = :correo, telefono = :telefono WHERE ident_cliente = :ident_cliente");
            $stament-> bindParam(":nombre", $nombre);
            $stament-> bindParam(":direccion", $direccion);
            $stament-> bindParam(":correo", $correo);
            $stament-> bindParam(":telefono", $telefono);
            $stament-> bindParam(":ident_cliente", $ident_cliente);
            $stament->execute();

            $sql = $this->PDO->prepare("UPDATE alquiler  SET numero_ejemplar = :numero_ejemplar, fecha_alquiler = :fecha_alquiler, fecha_devolucion = :fecha_devolucion WHERE ident_cliente = :ident_cliente");
            $sql-> bindParam(":numero_ejemplar", $numero_ejemplar);
            $sql-> bindParam(":fecha_alquiler", $fecha_alquiler);
            $sql-> bindParam(":fecha_devolucion", $fecha_devolucion);
            $sql-> bindParam(":ident_cliente", $ident_cliente);

            $this->PDO->commit();
            return ($sql->execute()) ? $ident_cliente : false;

            
            } catch (PDOException $ex) {
                //Something went wrong rollback!
                $this->PDO->rollBack();
                throw $ex;
            }
        }
        public function delete($ident_cliente){
            $stament = $this->PDO->prepare("DELETE FROM clientes WHERE ident_cliente = :ident_cliente");
            
            $stament-> bindParam(":ident_cliente", $ident_cliente);
            return ($stament->execute()) ? true : false;
        }
    }
?>