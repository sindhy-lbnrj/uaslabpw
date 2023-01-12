<?php
include 'config.php';
$sql = "DELETE FROM mahasiswa WHERE nim=".$_GET['nim'];

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

$conn->close();
?>
?>