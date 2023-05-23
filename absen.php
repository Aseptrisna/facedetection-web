<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facemask";
date_default_timezone_set('Asia/Jakarta');
$waktu = date("Y-m-d H:i:s");
$now  = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
$now1  = date("Y-m-d H:i:s", mktime(12, 0, 0, date("m"), date("d"), date("Y")));
$now2  = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
$nip = $_GET["nip"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "SELECT nama,divisi,foto FROM pengguna WHERE nip='$nip'";
$result1 = mysqli_query($conn, $sql1);


if (mysqli_num_rows($result1) > 0) {
  while ($row1 = mysqli_fetch_assoc($result1)) {
    $nama = $row1["nama"];
    $divisi = $row1["divisi"];
    $foto = $row1["foto"];
  }
}
if ($waktu > $now && $waktu < $now1) {
  $sql3 = "SELECT nama FROM absensi WHERE nama='$nama' AND waktu_absen >= '$now' AND waktu_absen <= '$now1'";
  $result3 = mysqli_query($conn, $sql3);
  if (mysqli_num_rows($result3) == 0) {
    $sql2 = "INSERT INTO absensi (nama, divisi,foto) VALUES ('$nama','$divisi','$foto')";
    $result2 = mysqli_query($conn, $sql2);
  }
} else if ($waktu > $now1 && $waktu < $now2) {
  $sql3 = "SELECT nama FROM absensi WHERE nama='$nama' AND waktu_absen >= '$now1' AND waktu_absen <= '$now2'";
  $result3 = mysqli_query($conn, $sql3);
  if (mysqli_num_rows($result3) == 0) {
    $sql2 = "INSERT INTO absensi (nama, divisi,foto) VALUES ('$nama','$divisi','$foto')";
    $result2 = mysqli_query($conn, $sql2);
  }
}

// echo $tomorrow;
