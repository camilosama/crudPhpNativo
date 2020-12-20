<?php
    include('config.ini.php');
    $usr=$_POST['usr'];
    $pw=$_POST['pw'];

    $sql = "SELECT count(*) as total FROM usuario WHERE user='$usr' AND password='$pw'";
    $result = mysqli_query($conn, $sql);
    $data=mysqli_fetch_assoc($result);
    echo $data['total'];
    $conn->close();
?>