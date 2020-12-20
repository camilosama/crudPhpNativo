<?php

include('config.ini.php');

$id = $_POST['item'];
$sql = "DELETE FROM datos WHERE cedula=$id";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>