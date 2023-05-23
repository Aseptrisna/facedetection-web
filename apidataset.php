<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facemask";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT kode FROM kode WHERE id=1";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT nama,nip FROM daftar WHERE id=1";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $kode=$row["kode"];

  }
}

if (mysqli_num_rows($result1) > 0) {
  while($row1 = mysqli_fetch_assoc($result1)) {
    $nama=$row1["nama"];
    $nip=$row1["nip"];
  }
}
$jsonnya = array("kode"=>$kode, "nama"=>$nama, "nip"=>$nip);
echo json_encode($jsonnya);
?>
