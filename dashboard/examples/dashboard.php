<?php
require_once "config.php";


$sql2 = "SELECT kode FROM kode WHERE id=1";
$result2 = mysqli_query($link, $sql2);

if (mysqli_num_rows($result2) > 0) {
  // output data of each row
  while($row2 = mysqli_fetch_assoc($result2)) {
    $kode=$row2["kode"];
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($kode=="0"){
      $sql = "UPDATE kode SET kode='5' WHERE id=1";
      mysqli_query($link, $sql);
    }
    else if($kode=="5"){
      $sql = "UPDATE kode SET kode='0' WHERE id=1";
      mysqli_query($link, $sql);
    }
    header("location: dashboard.php");
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
          <li class="active ">
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php if($kode=="0"){ ?>
            <button type="submit" class="btn btn-success btn-rounded">Start Facemask recognition</button>
          <?php }else if($kode=="5"){?>
            <button type="submit" class="btn btn-danger btn-rounded">Stop Facemask recognition</button>
          <?php } ?>
        </form>

            <div class="card">
              <div class="card-header">
                <div class="row">
                <h4 class="card-title"> Data Absensi</h4>


              </div>
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
                        Divisi
                      </th>
                      <th>
                        Waktu Absen
                      </th>
                    </thead>
                    <tbody>
                      <?php
                        $ambildata=mysqli_query($link, "SELECT * FROM absensi ORDER BY waktu_absen DESC");
                         while($a=mysqli_fetch_array($ambildata)){
                         ?>
                         <tr>
                         <td><img src="images/<?php  echo $a['foto'];?>" width="80" height="80" alt="Italian Trulli"></td>
                            <td><?php echo $a['nama'];?></td>
                            <td><?php echo $a['divisi'];?></td>
                            <td><?php echo $a['waktu_absen'];?></td>
                           </tr>
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
