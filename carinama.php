<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facemask";

$nip=$_GET["nip"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "SELECT nama FROM pengguna WHERE nip='$nip'";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
  while($row1 = mysqli_fetch_assoc($result1)) {
    $nama=$row1["nama"];
  }
}
echo $nama;
?>
