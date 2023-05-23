<<?php
require_once "config.php";
$sql1 = "UPDATE kode SET kode='3' WHERE id=1";
mysqli_query($link, $sql1);
mysqli_close($link);

?>
