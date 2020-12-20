<?php
    include('config.ini.php');
    $sql = "SELECT *  FROM datos ORDER BY nombre";
    $result = mysqli_query($conn, $sql);
    $conn->close();
?>