<?php
    include('config.ini.php');
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $cedula=$_POST['cedula'];
    $celular=$_POST['celular'];
    $direccion=$_POST['direccion'];

    $sql = "INSERT INTO datos (nombre, apellido, cedula,celular,direccion) VALUES ('$nombre','$apellido', $cedula,$celular,'$direccion');";

    if (mysqli_multi_query($conn, $sql)) {
      echo "New records created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>