<?php
include 'filesLogic.php';
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // Delete file to download from database
  
mysqli_query($conn, "DELETE FROM `files` WHERE `id`='$id'");
header("Location:downloads.php");
}


?>


