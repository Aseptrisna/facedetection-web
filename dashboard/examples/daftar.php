<?php
require_once "config.php";
$nama = $nip = $divisi = "";
$nama_err = $nip_err = $divisi_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["namalengkap"]))){
        $nama_err = "Masukan Nama";
    } else{
        $nama = trim($_POST["namalengkap"]);
    }
    if(empty(trim($_POST["nip"]))){
        $nip_err = "Masukan Nomor Induk Pegawai";
    } else{
        $nip = trim($_POST["nip"]);
    }
    if(empty(trim($_POST["divisi"]))){
        $divisi_err = "Please enter your password.";
    } else{
        $divisi = trim($_POST["divisi"]);
    }
    $tempat= trim($_POST["tempat"]);
    $tanggal= trim($_POST["tanggal"]);
    $agama= trim($_POST["agama"]);
    $alamat= trim($_POST["alamat"]);
    $hp= trim($_POST["hp"]);

    $temp = explode(".", $_FILES["uploadfile"]["name"]);
    $namanya=str_replace(" ","",$nama);
    $filename = $namanya . '.' . end($temp);
    $tempname = $_FILES["uploadfile"]["tmp_name"];  
    $folder = "images/".$filename;

    if(empty($nama_err) && empty($nip_err) && empty($divisi_err)){
      $sql = "INSERT INTO pengguna (nama, nip, divisi,facerecognition,tempat,tanggal_lahir,foto,alamat,nohp,agama) VALUES ('$nama', '$nip', '$divisi',0,'$tempat','$tanggal','$filename','$alamat','$hp','$agama')";
      mysqli_query($link, $sql);
      move_uploaded_file($tempname, $folder);
    }
    mysqli_close($link);
}


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Facemask Recognition
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.projectkitaid.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.projectkitaid.com" class="simple-text logo-normal">
          Facemask
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Data Absensi</p>
            </a>
          </li>

          <li>
            <a href="./user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Data User</p>
            </a>
          </li>

          <li class="active ">
            <a href="./daftar.php">
              <i class="nc-icon nc-simple-add"></i>
              <p>Tambah User</p>
            </a>
          </li>
          <li>
            <a href="./train.php">
              <i class="nc-icon nc-tap-01"></i>
              <p>Train Data</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Facemask Recognition</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">



            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-8">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">Daftar User Baru</h5>
                </div>
                <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-5 pr-1">
                        <div class="form-group">
                          <label>Nama Perusahaan</label>
                          <input type="text" class="form-control" disabled="" placeholder="Company" value="STEI">

                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" class="form-control" name="namalengkap">

                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>No. Pegawai</label>
                          <input type="text" class="form-control" name="nip">
                        </div>
                      </div>
                      <div class="col-md-6 px-1">
                        <div class="form-group">
                          <label>Divisi</label>
                          <input type="text" class="form-control" name="divisi">
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat">
                        </div>
                      </div>
                      <div class="col-md-6 px-1">
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <div class="rs-select2--light rs-select1--md">
                            <input id="datepicker" value="" name="tanggal"/>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" class="form-control" name="alamat">
                        </div>
                      </div>
                      <div class="col-md-6 px-1">
                        <div class="form-group">
                          <label>No. HP</label>
                          <input type="text" class="form-control" name="hp">
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Agama</label>
                          <input type="text" class="form-control" name="agama">
                        </div>
                      </div>
                      <div class="col-md-6 pr-1">
                      <label>Foto</label>
                        <div class="form-group">
                          
                          <input type="file" class="custom-file-input" id="contohupload2" name="uploadfile">
		                      <label class="custom-file-label" for="contohupload2">Choose file</label>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Submit</button>
                      </div>
                    </div>
                  </form>
                  <script>
                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap4'
                                });
                            </script>

                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">

          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">

            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by STEI'20_FMR_aliyaroost
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>
