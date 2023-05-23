<<?php
require_once "config.php";
date_default_timezone_set('Asia/Jakarta');
$randomNumber = date("Y-m-d H:i:s");
$sql = "UPDATE daftar SET nama='',nip='' WHERE id=1";
$sql1 = "UPDATE kode SET kode='0' WHERE id=1";
$sql2 = "UPDATE train SET waktu='$randomNumber' WHERE id=1";
mysqli_query($link, $sql);
mysqli_query($link, $sql1);
mysqli_query($link, $sql2);
mysqli_close($link);

?>
