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
        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }
        public function update($id, $nombre){
            return ($this->model->update($id, $nombre) != false) ? header("Location:show.php?id=".$id):  header("Location:index.php");
        }
        public function delete($id){
            return ($this->model->delete($id)) ? header("Location:index.php") : header("Location:show.php?id=".$id);
        }
    }
?>