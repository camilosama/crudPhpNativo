<?php
    include('config.ini.php');
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $cedula=$_POST['cedula'];
    $celular=$_POST['celular'];
    $direccion=$_POST['direccion'];
    $sql = "UPDATE datos SET nombre='$nombre', apellido='$apellido', cedula=$cedula, celular=$celular, direccion='$direccion' WHERE cedula=$cedula";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    $conn->close();
?>