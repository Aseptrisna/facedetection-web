<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facemask";
$id=$_GET["id"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE kode SET kode='$id' WHERE id=1";
$result = mysqli_query($conn, $sql);

?>
