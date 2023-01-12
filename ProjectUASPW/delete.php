<?php
include "config.php";
$nim = $_GET['nim'];
$sql = "DELETE FROM `mahasiswa` WHERE id = $nim";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: user.php?msg=Record deleted successfully");
}
else{
    echo " Failed: " . mysqli_error();
}
?>