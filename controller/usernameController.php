<?php
    class UsernameController{
        private $model;
        public function __construct(){
            require_once("c://xampp/htdocs/maxivideo/model/usernameModel.php");
            $this -> model = new usernameModel();

        }
        public function guardar($nombre){
            $id = $this ->model->insertar($nombre);
            return ($id!=false)? header("Location:show.php?id=".$id) :  header("Location:create.php");
        }
        public function guardarCliente($cedula, $nombre, $direccion, $correo, $telefono, $numeroEjemplar, $fechaAlquiler, $fechaDevolucion){
            $ident_cliente = $this ->model->insertarCliente($cedula, $nombre, $direccion, $correo, $telefono, $numeroEjemplar, $fechaAlquiler, $fechaDevolucion);
            return ($ident_cliente!=false)? header("Location:show.php?ident_cliente=".$ident_cliente) :  header("Location:create.php");
        }
        public function show($id){
            return ($this->model->show($id)!=false) ? $this->model->show($id) : header("Location:index.php");
        }
        public function consult($id){
            return ($this->model->consult($id)!=false) ? $this->model->consult($id) : header("Location:index.php");
        }
        public function consult_resumen($numero_ejemplar){
            return ($this->model->consult_resumen($numero_ejemplar)!=false) ? $this->model->consult_resumen($numero_ejemplar) : header("Location:index.php");
        }
        public function consult_pelicula($id_pelicula){
            return ($this->model->consult_pelicula($id_pelicula)!=false) ? $this->model->consult_pelicula($id_pelicula) : header("Location:index.php");
        }
        public function consult_pelicula_director($id_pelicula){
            return ($this->model->consult_pelicula_director($id_pelicula)!=false) ? $this->model->consult_pelicula_director($id_pelicula) : header("Location:index.php");
        }
        public function consult_director($id_director){
            return ($this->model->consult_director($id_director)!=false) ? $this->model->consult_director($id_director) : header("Location:index.php");
        }
        public function consult_pelicula_actor($id_pelicula){
            return ($this->model->consult_pelicula_actor($id_pelicula)!=false) ? $this->model->consult_pelicula_actor($id_pelicula) : header("Location:index.php");
        }
        public function consult_actor($id_actor){
            return ($this->model->consult_actor($id_actor)!=false) ? $this->model->consult_actor($id_actor) : header("Location:index.php");
        }
        
        
        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }
        public function update($id, $nombre, $direccion, $correo, $telefono, $numero_ejemplar, $fecha_alquiler, $fecha_devolucion){
            return ($this->model->update($id, $nombre, $direccion, $correo, $telefono, $numero_ejemplar, $fecha_alquiler, $fecha_devolucion) != false) ? header("Location:show.php?id=".$id):  header("Location:index.php");
        }
        public function delete($ident_cliente){
            return ($this->model->delete($ident_cliente)) ? header("Location:index.php") : header("Location:show.php?id=".$ident_cliente);
        }
    }
?>