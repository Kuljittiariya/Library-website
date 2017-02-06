<?php

$conn = new mysqli("localhost","zp9943_library","moreFin28","zp9943_library");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}
mysqli_query($conn,"DELETE FROM Item WHERE ItemNo ='".$_GET['ItemNo']."'");

mysqli_close($conn);

echo("Delete data");
?>