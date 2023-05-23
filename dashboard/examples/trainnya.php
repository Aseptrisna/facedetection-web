<?php
require_once "config.php";
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
      $( "#demo12" ).click(function() {
        const http = new XMLHttpRequest()
        http.open("GET", "trainkirim.php",true)
        http.send()
        http.onload = () => console.log(http.responseText)
    });
    </script>';
  echo '<div class="form-group">';
  echo '<div class="alert alert-primary" role="alert">
          Klik Mulai untuk memulai Training Data
        </div>';
  echo '</div>';
  echo '<div class="modal-footer">';
  echo '<button id="demo12" class="btn btn-success" onclick="myFunction()">Mulai</button>';
  echo '</div>';
}
else if($kode=="3"){
  echo '<div class="container center">';
  echo '<div class="card text-center" style="width: 28rem;">';
  echo '<div class="card-body">';
  echo '<div class="spinner-border" role="status">';
  echo '<span class="sr-only">Loading...</span>';

  echo '</div>';

  echo '</div>';
  echo '<div class="alert alert-warning">';
  echo '<strong>Sabar</strong> Butuh beberapa waktu untuk Training';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
else if($kode=="4"){
  echo '<script type="text/JavaScript">
      $( "#tutup" ).click(function() {
        const http = new XMLHttpRequest()

        http.open("GET", "tutuptrain.php",true)
        http.send()

        http.onload = () => console.log(http.responseText)
        window.location.reload(1);
    });
    </script>';
  echo '<form>';
  echo '<div class="container center">';
  echo '<div class="card text-center" style="width: 28rem;">';

  echo '<div class="card-body">';
  echo '<img class="card-img-top" src="https://www.pngall.com/wp-content/uploads/5/Checklist-Logo.png" style="width:200px;height:200px;" alt="Card image cap">';
  echo '</div>';
  echo '<div class="alert alert-success">';
  echo '<strong>Sukses</strong> Training data selesai';
  echo '</div>';
  echo '<button id="tutup" class="btn btn-danger" onclick="myFunction()">Tutup</button>';
  echo '</div>';
  echo '</div>';
  echo '</form>';
}
?>
