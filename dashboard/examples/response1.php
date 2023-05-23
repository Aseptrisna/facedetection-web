<<?php
require_once "config.php";
$nama=$_GET['nama'];
$nip=$_GET['nip'];

$sql = "UPDATE daftar SET nama='$nama',nip='$nip' WHERE id=1";
$sql1 = "UPDATE kode SET kode='1' WHERE id=1";
mysqli_query($link, $sql);
mysqli_query($link, $sql1);
mysqli_close($link);

?>
