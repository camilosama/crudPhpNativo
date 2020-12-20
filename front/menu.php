<div class="card mt-3">
    <span class="float-right btn btn-primary" onclick="modalAddItem()" >Nuevo Item <i class="fas fa-plus"></i></span>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombres</th>   
                <th>Apellidos</th>   
                <th>Cedula</th>   
                <th># Celular</th>    
                <th>Direccion</th>   
                <th>Acciones</th>   
            </tr> 
        </thead>
        <tbody>
    <?php
        include('../back/listaDatos.php');
        while($row = mysqli_fetch_assoc($result)) {
            $nombre=$row["nombre"];
            $apellido=$row["apellido"];
            $cedula=$row["cedula"];
            $celular=$row["celular"];
            $direccion=$row["direccion"];
    ?>
        <tr>
            <td><?php echo $nombre ?></td>
            <td><?php echo $apellido ?></td>
            <td><?php echo $cedula ?></td>
            <td><?php echo $celular ?></td>
            <td><?php echo $direccion ?></td>
            <td>
                <button type="button" class="btn btn-info" onclick="modItem('<?php echo $cedula ?>')" ><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger" onclick="deleteItem(<?php echo $cedula ?>)">  <i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>
    <?php
        }
    ?>
        </tbody>
    </table>
</div>
<div id="respuestaModal"></div>