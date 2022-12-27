<?php
    require_once("c://xampp/htdocs/crud-php/controller/usernameController.php");
    $obj = new usernameController();
    $obj->guardarCliente($_POST['cedula'], $_POST['nombre'], $_POST['direccion'], $_POST['correo'], $_POST['telefono']);
    //echo $_POST['nombre'];
?>