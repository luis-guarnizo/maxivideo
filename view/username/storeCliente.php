<?php
    require_once("c://xampp/htdocs/maxivideo/controller/usernameController.php");
    $obj = new usernameController();
    $obj->guardarCliente($_POST['cedula'], $_POST['nombre'], $_POST['direccion'], $_POST['correo'], $_POST['telefono'],$_POST['numeroEjemplar'],
    $_POST['fechaAlquiler'],$_POST['fechaDevolucion']);
    //echo $_POST['nombre'];
?>