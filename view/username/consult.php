<?php
    require_once("c://xampp/htdocs/maxivideo/view/head/head.php");
    require_once("c://xampp/htdocs/maxivideo/controller/usernameController.php");
    $obj = new usernameController();
    $date = $obj->consult($_POST['ident_cliente']); 
    $date_pelicula = $obj->consult_resumen($date["numero_ejemplar"]);
    $date_pelicula_info = $obj->consult_pelicula($date_pelicula["id_pelicula"]);
    $date_pelicula_director = $obj->consult_pelicula_director($date_pelicula["id_pelicula"]);
    $date_director = $obj->consult_director($date_pelicula_director["id_director"]);

    $date_pelicula_actor = $obj->consult_pelicula_actor($date_pelicula["id_pelicula"]);
    //$date_actor = $obj->consult_actor($date_pelicula_actor["id_actor[0]"]);
    //print_r($date_pelicula_actor);
    foreach ($date_pelicula_actor as $arrays){
        $date_actor = $obj->consult_actor($arrays["id_actor"]);
        //print_r($arrays["id_actor"]);
        //print_r($date_actor);
        foreach ($date_actor as $actor ) {
            //print_r($actor["nombre"]);
        }
    } 
        
        
    //print_r($date_actor);
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Dirección</th>
            <th scope="col">correo</th>
            <th scope="col">telefono</th>
            <th scope="col">Ejemplar</th>
            <th scope="col">Fecha Alquiler</th>
            <th scope="col">Fecha Devolución</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody> 
        <tr>
            <td scope="col"><?= $date["ident_cliente"] ?></td>
            <td scope="col"><?= $date["nombre"] ?></td>
            <td scope="col"><?= $date["direccion"] ?></td>
            <td scope="col"><?= $date["correo"] ?></td>
            <td scope="col"><?= $date["telefono"] ?></td>
            <td scope="col"><?= $date["numero_ejemplar"] ?></td>
            <td scope="col"><?= $date["fecha_alquiler"] ?></td>
            <td scope="col"><?= $date["fecha_devolucion"] ?></td>
            <th>
                

                <a href="edit.php?ident_cliente=<?= $date["ident_cliente"]?>" class="btn btn-success">Modificar</a>
                <!-- Button trigger modal -->
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
                

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el registro?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Una vez eliminado no se podrá recuperar el registro
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a href="delete.php?ident_cliente=<?= $date["ident_cliente"]?>" class="btn btn-danger">Eliminar</a>
                        
                    </div>
                    </div>
                </div>
                </div>
            </th>
            
        </tr>
         
    </tbody>
</table>
<h2>Resumen de la película</h2>
<!-- informacion adicional -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">Titulo de la pelicula</th>
            <th scope="col">Nombre del director</th>
            <th scope="col">Nacionalidad del director</th>
            <th colspan="3">Actores</th>
            
        </tr>
    </thead>
    <tbody> 
                     <tr>
                        <td scope="col"><?= $date_pelicula_info["titulo"] ?></td>
                        <td scope="col"><?= $date_director["nombre"] ?></td>
                        <td scope="col"><?= $date_pelicula_info["nacionalidad"] ?></td>
        <?php if($date_pelicula_actor): ?>
            <?php foreach ($date_pelicula_actor as $arrays): ?>
                <?php $date_actor = $obj->consult_actor($arrays["id_actor"]);?>
                <?php foreach ($date_actor as $actor ):?>


                    
                        
                        <!-- actores -->

                        <td scope="col"><?= $actor["nombre"] ?></td>
                        
                    
                <?php endforeach ?>
            <?php endforeach ?>
                    </tr>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No hay Registros disponibles</td>
            </tr>
        <?php endif; ?>    
        
        
         
                
                
            
        
           
    </tbody>
</table>
<?php
    require_once("c://xampp/htdocs/maxivideo/view/head/footer.php");    
?>