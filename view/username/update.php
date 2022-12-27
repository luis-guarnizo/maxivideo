<?php
    
    require_once("c://xampp/htdocs/maxivideo/controller/usernameController.php");
    $obj = new usernameController();

    $obj->update($_POST['ident_cliente'], $_POST['nombre'], $_POST['direccion'], $_POST['correo'], $_POST['telefono'], $_POST['numero_ejemplar']);
    
?>