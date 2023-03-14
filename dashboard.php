<?php
session_start();
include "controllers/db.php";
if ($_SESSION['login'] == null) {
  header('location:login.php');
}
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/logos/nkopoi.jpeg">
  <title>
    Dashboard Perpustakaan_v2
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-danger  position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="">
        <img src="assets/img/logos/pamflet.jpeg" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Library.care</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <?php
        $level = $_SESSION['level'];
        if ($level == 'Petugas') {
        ?>

          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php?pages=users">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php?pages=buku">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-book-bookmark text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Buku</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php?pages=siswa">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-hat-3 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Siswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php?pages=peminjaman">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-shop text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Peminjaman</span>
            </a>
          </li>

        <?php
        } else {
        ?>

          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php?pages=data_peminjaman">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-bag-17 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Data Peminjaman</span>
            </a>
          </li>

        <?php } ?>

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-ms-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <span class="text-light btn btn-outline-light">Selamat Datang,<?= $_SESSION['username']; ?></span>
            <a href="routes/proses.php?aksi=logout" class="text-light btn btn-outline-light ms-2 bg-danger">Logout</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="number">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      JUMLAH USERS
                    </p>
                    <p class="mb-0 text-bold">
                      <?=$perpus->jumUsers();?>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                <div class="number">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      JUMLAH SISWA
                    </p>
                    <p class="mb-0 text-bold">
                      <?=$perpus->jumSiswa();?>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-hat-3 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                <div class="number">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      JUMLAH BUKU
                    </p>
                    <p class="mb-0 text-bold">
                      <?=$perpus->jumBuku();?>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-book-bookmark text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                <div class="number">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      JUMLAH PEMINJAMAN
                    </p>
                    <p class="mb-0 text-bold">
                      <?=$perpus->jumPeminjaman();?>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Library.care</h6>
              <p class="text-ms mb-0">

                <?php

                @$pages = $_GET['pages'];
                if ($pages == 'users') {
                  @$act = $_GET['act'];
                  if ($act == 'tambah') {
                    include "views/petugas/users/tambah.php";
                  } elseif ($act == 'ubah') {
                    include "views/petugas/users/ubah.php";
                  } else {
                  include "views/petugas/users/users.php";
                  }
                }elseif ($pages == 'buku') {
                  @$act = $_GET['act'];
                  if ($act == 'tambah') {
                    include "views/petugas/buku/tambah.php";
                  }elseif ($act == 'ubah') {
                    include "views/petugas/buku/ubah.php";
                  }else {
                  include "views/petugas/buku/buku.php";
                  }
                } elseif ($pages == 'siswa') {
                  @$act = $_GET['act'];
                  if ($act == 'tambah') {
                    include "views/petugas/siswa/tambah.php";
                  }elseif ($act == 'ubah') {
                    include "views/petugas/siswa/ubah.php";
                  }else {
                  include "views/petugas/siswa/siswa.php";
                  }
                } elseif ($pages == 'peminjaman') {
                  @$act = $_GET['act'];
                  if ($act == 'tambah') {
                    include "views/petugas/peminjaman/tambah.php";
                  }else {
                  include "views/petugas/peminjaman/peminjaman.php";
                  }
                } elseif ($pages == 'data_peminjaman') {
                  include "views/siswa/data_peminjaman.php";
                } else {
                  echo "Nekopoi Library.care Adalah Aplikasi Perpustakaan Yang Akan Mempermudah Dan Membantu Dalam Pendataan Buku Dan Siswa Dengan Mudah Di Kontrol.";
                }
                ?>

              </p>
              <div><br><br></div>
            </div>
          </div>
        </div>
        <footer class="footer pt-3  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                  © <script>
                    document.write(new Date().getFullYear())
                  </script>,
                  made with <i class="fa fa-heart"></i> by
                  <a href="https://akcdn.detik.net.id/visual/2022/06/21/megawati-di-rakernas-ii-pdi-perjuangan-desa-kuat-indonesia-maju-dan-berdaulat-21-juni-2022-15_169.png?w=715&q=90" class="font-weight-bold">Dukung Kami</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php
  if (@$_SESSION['success'] != '') {
  ?>
    <script>
      Swal.fire(
        'Good job!',
        '<?= $_SESSION['success']; ?>',
        'success'
      )
    </script>
  <?php
    unset($_SESSION['success']);
  }
  ?>
  <?php
  if (@$_SESSION['warning'] != '') {
  ?>
    <script>
      Swal.fire(
        'Warning!',
        '<?= $_SESSION['warning']; ?>',
        'warning'
      )
    </script>
  <?php
    unset($_SESSION['warning']);
  }
  ?>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>