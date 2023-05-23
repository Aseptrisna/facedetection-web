<?php
require_once "config.php";
$isi=0;
if(isset($_POST['submit'])){
    if(empty(trim($_POST["nama"]))){
        $nama_err = "Masukan Nama";
    } else{
        $nama = trim($_POST["nama"]);
    }
    if(empty(trim($_POST["nip"]))){
        $nip_err = "Masukan Nomor Induk Pegawai";
    } else{
        $nip = trim($_POST["nip"]);
    }
    if(empty($nama_err) && empty($nip_err)){
      $sql = "UPDATE daftar SET nama='$nama',nip='$nip' WHERE id=1";
      $sql1 = "UPDATE kode SET kode='1' WHERE id=1";
      if(mysqli_query($link, $sql) && mysqli_query($link, $sql1)){
        $isi=1;
      }


    }
    mysqli_close($link);
}
$sql2 = "SELECT kode FROM kode WHERE id=1";
$result2 = mysqli_query($link, $sql2);

if (mysqli_num_rows($result2) > 0) {
  // output data of each row
  while($row2 = mysqli_fetch_assoc($result2)) {
    $kode=$row2["kode"];
  }
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
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

          <li class="active ">
            <a href="./user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Data User</p>
            </a>
          </li>

          <li>
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
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Data User</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Foto
                      </th>
                      <th>
                        Nama
                      </th>
                      <th>
                        No. Pegawai
                      </th>
                      <th>
                        Divisi
                      </th>
                      <th>
                        TTL
                      </th>
                      <th>
                        Alamat
                      </th>
                      <th>
                        No. HP
                      </th>
                      <th>
                        Agama
                      </th>
                      <th>
                        Face Recognition
                      </th>
                    </thead>
                    <tbody>
                      <?php
                        $ambildata=mysqli_query($link, "SELECT * FROM pengguna order by id asc");
                         while($a=mysqli_fetch_array($ambildata)){
                           $idnya= $a['id'];

                         ?>
                         <tr>
                            <td><img src="images/<?php  echo $a['foto'];?>" width="80" height="80" alt="Italian Trulli"></td>
                            <td><?php  echo $a['nama'];?></td>
                            <td><?php echo $a['nip'];?></td>
                            <td><?php echo $a['divisi'];?></td>
                            <td><?php echo $a['tempat'] .","." ".$a['tanggal_lahir'];?></td>
                            <td><?php echo $a['alamat'];?></td>
                            <td><?php echo $a['nohp'];?></td>
                            <td><?php echo $a['agama'];?></td>
                            <td>
                              <?php if($a["facerecognition"]=="0"){
                                 if($kode=="0"){ ?>
                                <a href="#" type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModal<?php echo $idnya;?>">Daftar</a>
                              <?php }else if($kode=="5"){?>
                                <a href="#" type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModal<?php echo $idnya;?>" disabled>Daftar</a>
                              <?php }} else {?>
                                <a href="#" type="button" class="btn btn-success btn-md" disabled>Sudah Terdaftar</a>
                              <?php }?>
                            </td>

                           </tr>



                          <div id="myModal<?php echo $idnya;?>" class="modal fade" role="dialog">
                            <script type="text/javascript">
                              var auto_refresh = setInterval(
                              function () {
                              $("#my_card<?php echo $idnya;?>").load("response.php?id=<?php echo $idnya;?>").fadeIn("slow");

                            }, 1500);
                            </script>
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" id="my_card<?php echo $idnya;?>">
                                  </div>
                              </div>

                            </div>
                          </div>
                          <?php
                          }
                        ?>


                    </tbody>
                  </table>
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
