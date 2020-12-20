<?php
    include('config.ini.php');
    $sql = "SELECT *  FROM datos WHERE cedula=$id";
    $result = mysqli_query($conn, $sql);
    $data=mysqli_fetch_assoc($result);
    $nombre=$data['nombre'];
    $apellido=$data['apellido'];
    $cedula=$data['cedula'];
    $celular=$data['celular'];
    $direccion=$data['direccion'];
    $conn->close();
?>