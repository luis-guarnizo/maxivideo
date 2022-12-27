<?php
    require_once("c://xampp/htdocs/maxivideo/view/head/head.php");
    require_once("c://xampp/htdocs/maxivideo/controller/usernameController.php");
?>
    <div class="mb-3">
        <a href="create.php" class = "btn btn-primary">Agregar nuevo usuario</a>
    </div>
    <h2>Ingrese la cedula del cliente para consultar</h2>
    <form action="consult.php" method= "POST" autocomplete="off">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cédula</label>
            <input type="text" name="ident_cliente" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" class="btn btn-primary">Consultar</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
    </form>

<?php
    require_once("c://xampp/htdocs/maxivideo/view/head/footer.php");    
?>