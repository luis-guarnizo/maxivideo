<?php
    require_once("c://xampp/htdocs/crud-php/view/head/head.php");
    require_once("c://xampp/htdocs/crud-php/controller/usernameController.php");
    $obj = new usernameController();
    $user = $obj->show($_GET['id']);
    //print_r($user);
?>

    <form action="update.php" method="post" autocomplete="off">
        <h2>Modificando registro</h2>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            <input type="text" name= "id" readonly class="form-control-plaintext" id="staticEmail" value="<?= $user["id"]?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nuevo Nombre</label>
            <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" id="inputPassword" value="<?= $user["nombre"]?>">
            </div>
        </div>
        <div>
            <input type="submit" class= "btn btn-success" value="Actualizar">
            <a href="show.php?id=<?= $user["id"]?>" class="btn btn-danger">Calcelar</a>
        </div>
    </form>

<?php
    require_once("c://xampp/htdocs/crud-php/view/head/footer.php");    
?>