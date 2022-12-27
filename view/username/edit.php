<?php
    require_once("c://xampp/htdocs/maxivideo/view/head/head.php");
    require_once("c://xampp/htdocs/maxivideo/controller/usernameController.php");
    $obj = new usernameController();
    $user = $obj->show($_GET['ident_cliente']);
    //print_r($user);
?>

    <form action="update.php" method="post" autocomplete="off">
        <h2>Modificando registro</h2>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Cédula</label>
            <div class="col-sm-10">
            <input type="text" name= "ident_cliente" readonly class="form-control-plaintext" id="staticEmail" value="<?= $user["ident_cliente"]?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nuevo Nombre</label>
            <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" id="inputPassword" value="<?= $user["nombre"]?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nueva dirección</label>
            <div class="col-sm-10">
            <input type="text" name="direccion" class="form-control" id="inputPassword" value="<?= $user["direccion"]?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nueva correo</label>
            <div class="col-sm-10">
            <input type="text" name="correo" class="form-control" id="inputPassword" value="<?= $user["correo"]?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nueva teléfono</label>
            <div class="col-sm-10">
            <input type="text" name="telefono" class="form-control" id="inputPassword" value="<?= $user["telefono"]?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nuevo ejemplar</label>
            <div class="col-sm-10">
            <input type="text" name="numero_ejemplar" class="form-control" id="inputPassword" value="<?= $user["numero_ejemplar"]?>">
            </div>
        </div>
        

        <div>
            <input type="submit" class= "btn btn-success" value="Actualizar">
            <a href="show.php?id=<?= $user["ident_cliente"]?>" class="btn btn-danger">Calcelar</a>
        </div>
    </form>

<?php
    require_once("c://xampp/htdocs/maxivideo/view/head/footer.php");    
?>