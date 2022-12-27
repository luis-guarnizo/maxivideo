<?php
    
    require_once("c://xampp/htdocs/maxivideo/controller/usernameController.php");
    $obj = new usernameController();

    $obj->update($_POST['id'], $_POST['nombre']);
    
?>