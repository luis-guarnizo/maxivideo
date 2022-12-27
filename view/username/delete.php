<?php
    require_once("c://xampp/htdocs/maxivideo/controller/usernameController.php");
    $obj = new usernameController();
    $obj->delete($_GET['ident_cliente']);
    //print_r($user);
?>