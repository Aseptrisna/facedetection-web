<<?php
require_once "config.php";
$nama=$_GET['nama'];
$nip=$_GET['nip'];

$sql = "UPDATE daftar SET nama='',nip='' WHERE id=1";
$sql1 = "UPDATE kode SET kode='0' WHERE id=1";
$sql2 = "UPDATE pengguna SET facerecognition='1' WHERE nip='$nip'";
mysqli_query($link, $sql);
mysqli_query($link, $sql1);
mysqli_query($link, $sql2);
mysqli_close($link);

?>
