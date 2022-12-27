<?php
    require_once("c://xampp/htdocs/crud-php/controller/usernameController.php");
    $obj = new usernameController();
    $obj->delete($_GET['id']);
    //print_r($user);
?>