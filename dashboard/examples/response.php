<?php
require_once "config.php";
$isi=0;
$id=$_GET["id"];
$sql1 = "SELECT nama,nip FROM pengguna WHERE id='$id'";
$result1 = mysqli_query($link, $sql1);

if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  while($row1 = mysqli_fetch_assoc($result1)) {
    $nama=$row1['nama'];
    $nip=$row1['nip'];
  }
}
$sql = "SELECT kode FROM kode WHERE id=1";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $kode=$row['kode'];
  }
}

if($kode=="0"){

  echo '<script type="text/JavaScript">
    var nama = document.getElementById("nama'.$id.'");
    var nip = document.getElementById("nip'.$id.'");
      $( "#demo'.$id.'" ).click(function() {
        const http = new XMLHttpRequest()

        http.open("GET", "response1.php?nama='.$nama.'&nip='.$nip.'",true)
        http.send()

        http.onload = () => console.log(http.responseText)
    });
    </script>';
  echo '<div class="form-group">';
  echo  '<label>Nama</label>';
  echo '<input type="text" name="nama" class="form-control" id="nama'.$id.'" value="'.$nama.'" readonly=readonly>';
  echo '</div>';
  echo '<div class="form-group">';
  echo '<label>NIK</label>';
  echo '<input type="text" name="nip" class="form-control" id="nip'.$id.'" value="'.$nip.'" readonly=readonly>';
  echo '</div>';
  echo '<div class="modal-footer">';
  echo '<button id="demo'.$id.'" class="btn btn-success" onclick="myFunction()">Mulai</button>';
  echo '</div>';
}
else if($kode=="1"){
  echo '<div class="container center">';
  echo '<div class="card text-center" style="width: 28rem;">';
  echo '<div class="card-body">';
  echo '<div class="spinner-border" role="status">';
  echo '<span class="sr-only">Loading...</span>';

  echo '</div>';

  echo '</div>';
  echo '<div class="alert alert-warning">';
  echo '<strong>Sabar</strong> Masih mengambil gambar';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
else if($kode=="2"){
  echo '<script type="text/JavaScript">
      $( "#tutup'.$id.'" ).click(function() {
        const http = new XMLHttpRequest()

        http.open("GET", "tutup.php?nama='.$nama.'&nip='.$nip.'",true)
        http.send()

        http.onload = () => console.log(http.responseText)
        window.location.reload();
    });
    </script>';
  echo '<div class="container center">';
  echo '<div class="card text-center" style="width: 28rem;">';

  echo '<div class="card-body">';
  echo '<img class="card-img-top" src="https://www.pngall.com/wp-content/uploads/5/Checklist-Logo.png" style="width:200px;height:200px;" alt="Card image cap">';
  echo '</div>';
  echo '<div class="alert alert-success">';
  echo '<strong>Sukses</strong> Pengambilan gambar selesai';
  echo '</div>';
  echo '<button id="tutup'.$id.'" class="btn btn-danger" onclick="myFunction()">Tutup</button>';
  echo '</div>';
  echo '</div>';
}
 ?>
